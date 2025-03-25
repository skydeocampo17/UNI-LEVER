@props(['headers'])

<div class="table-container">
    <table class="table table-dark table-hover text-center">
        <thead class="table-gradient">
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
