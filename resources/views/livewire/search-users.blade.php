<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <input wire:model="search" type="text" placeholder="Search posts by title...">

    <h1>Search Results:</h1>

    <ul>
        @foreach($users as $user)
        <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
