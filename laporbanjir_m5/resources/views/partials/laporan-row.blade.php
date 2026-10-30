<tr>
    <td>{{ $no }}</td>
    <td>
        <strong>{{ $item->nama_pelapor }}</strong>
        @if ($item->deskripsi)<small>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</small>@endif
    </td>
    <td>
        {{ $item->kecamatan }}
        <small>{{ $item->alamat }}</small>
    </td>
    <td>{{ $item->tinggi_air }} cm</td>
    <td><span class="badge badge-{{ strtolower($item->status) }}">{{ $item->status }}</span></td>
    <td>{{ $item->tanggal_lapor->translatedFormat('d M Y') }}</td>
    <td>
        <form action="{{ route('laporan.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus laporan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger-soft">Hapus</button>
        </form>
    </td>
</tr>