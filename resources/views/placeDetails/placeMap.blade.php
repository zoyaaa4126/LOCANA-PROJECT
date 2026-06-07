@extends('layouts.app')
@section('title', $places->nama_tempat . ' - Map')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="relative w-full" style="height: calc(100vh - 113px);">

    <div class="w-full h-full" id="map"></div>

    <button onclick="history.back()" class="absolute top-4 left-4 z-[1000] bg-[#FBB45E] w-16 h-12 rounded-xl flex items-center justify-center shadow-lg hover:bg-[#E2A255] transition max-md:scale-75">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
        </svg>
    </button>

    <div class="absolute top-30 left-4 z-[1000] bg-white rounded-3xl shadow-2xl overflow-hidden w-[320px] max-md:hidden">
        <div class="relative h-[160px]">
            <img src="{{ asset($places->gambar_tempat) }}" class="w-full h-full object-cover" alt="{{ $places->nama_tempat }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-4 text-white">
                <p class="text-lg font-bold">{{ $places->nama_tempat }}</p>
                <p class="text-xs font-semibold">
                    ⭐ • {{ $places->kategori->nama }} • Rp.{{ number_format($places->harga_min, 0, ',', '.') }}-{{ number_format($places->harga_max, 0, ',', '.') }} • <span id="info-jarak-desktop">Menghitung...</span>
                </p>
            </div>
        </div>
        <div class="flex items-start gap-2 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#FBB45E" class="mt-0.5 shrink-0">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            <p class="text-sm font-semibold text-[#363B58]">{{ $places->alamat_lengkap }}</p>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 z-[1000] bg-white rounded-t-3xl shadow-2xl overflow-hidden md:hidden">
        <div class="relative h-[140px]">
            <img src="{{ asset($places->gambar_tempat) }}" class="w-full h-full object-cover" alt="{{ $places->nama_tempat }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-4 text-white">
                <p class="text-lg font-bold">{{ $places->nama_tempat }}</p>
                <p class="text-xs font-semibold">
                    ⭐ • {{ $places->kategori->nama }} • Rp.{{ number_format($places->harga_min, 0, ',', '.') }}-{{ number_format($places->harga_max, 0, ',', '.') }} • <span id="info-jarak">Menghitung...</span>
                </p>
            </div>
        </div>
        <div class="flex items-start gap-2 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#FBB45E" class="mt-0.5 shrink-0">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            <p class="text-sm font-semibold text-[#363B58]">{{ $places->alamat_lengkap }}</p>
        </div>
    </div>

</div>

<script>
    const destLat = {{ $places->latitude }};
    const destLng = {{ $places->longitude }};

    const map = L.map('map').setView([destLat, destLng], 13);

    const zoomControl = document.querySelector('.leaflet-top.leaflet-left');
    if (zoomControl) {
        zoomControl.style.top = 'auto';
        zoomControl.style.bottom = '280px';
        zoomControl.style.left = 'auto';
        zoomControl.style.right = '10px';
    }

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([destLat, destLng]).addTo(map)
        .bindPopup(`<b>{{ $places->nama_tempat }}</b>`)
        .openPopup();

    navigator.geolocation.getCurrentPosition(pos => {
        let userLat = pos.coords.latitude;
        let userLng = pos.coords.longitude;

        const userIcon = L.circleMarker([userLat, userLng], {
            color: '#363B58',
            fillColor: '#FBB45E',
            fillOpacity: 1,
            radius: 8
        }).addTo(map).bindPopup('Lokasi kamu');

        navigator.geolocation.watchPosition(pos => {
            userIcon.setLatLng([pos.coords.latitude, pos.coords.longitude]);
        });

        fetch(`https://router.project-osrm.org/route/v1/driving/${userLng},${userLat};${destLng},${destLat}?overview=full&geometries=geojson`)
        .then(res => res.json())
        .then(data => {
            const route = data.routes[0];
            const coords = route.geometry.coordinates.map(c => [c[1], c[0]]);
            const jarak = (route.distance / 1000).toFixed(1);
            const waktu = Math.round(route.duration / 60);

            L.polyline(coords, { color: '#ff8c00', weight: 5 }).addTo(map);
            map.fitBounds(L.polyline(coords).getBounds(), { paddingTopLeft: [20, 20], paddingBottomRight: [20, 300] });

            document.getElementById('info-jarak').innerText = `${jarak} km • ±${waktu} menit berkendara`;
            document.getElementById('info-jarak-desktop').innerText = `${jarak} km • ±${waktu} menit berkendara`;
        })
        .catch(() => {
            document.getElementById('info-jarak').innerText = 'Rute tidak tersedia.';
            document.getElementById('info-jarak-desktop').innerText = 'Rute tidak tersedia.';
        });

    }, () => {
        document.getElementById('info-jarak').innerText = 'Lokasi tidak tersedia.';
        document.getElementById('info-jarak-desktop').innerText = 'Lokasi tidak tersedia.';
    });
</script>

@endsection