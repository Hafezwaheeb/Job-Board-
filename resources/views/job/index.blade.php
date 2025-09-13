<div>
    <h1>Jobs welcome</h1>
    @foreach ($jobs as $job)
        <div>
            <h2>{{ $job['title'] }}</h2>
            <p>Salary: {{ $job['salary'] }}</p>
        </div>
    @endforeach
</div>
