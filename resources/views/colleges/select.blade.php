@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Select a College</h2>

    <input type="text" id="searchBar" class="form-control mb-3" placeholder="🔍 Search for a college...">

    <ul class="list-group" id="collegeList">
        @foreach($colleges as $college)
        <li class="list-group-item dark-list-item">
            <a href="{{ route('departments.index', ['college' => $college->CollegeID]) }}" class="dark-list-link">
                {{ $college->CollegeName }}
            </a>
        </li>
        @endforeach
    </ul>
</div>

<script>
    document.getElementById("searchBar").addEventListener("input", function() {
        let filter = this.value.toLowerCase();
        let items = document.querySelectorAll("#collegeList .list-group-item");

        items.forEach(function(item) {
            let text = item.textContent.toLowerCase();
            item.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection
