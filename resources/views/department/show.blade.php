<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>




    <a class="btn btn-warning mb-3" href ="{{ route('department.index') }}" role="button">back</a>

    {{-- department --}}
    <h6>Data department</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">name: {{ $department->name }}</li>
        <li class="list-group-item">
            created at: {{ $department->created_at->format('d F Y H:i:s') }}
        </li>
    </ul>


    {{-- lecturer --}}
    <h6>Data lecturer</h6>
    <ul class="list-group">
        @foreach ($department->lecturers as $lecturer)
            <li class="list-group-item">{{ $lecturer->name }}</li>
        @endforeach

    </ul>


</x-app>
