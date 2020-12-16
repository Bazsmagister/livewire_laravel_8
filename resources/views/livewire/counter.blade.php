<div style="text-align : center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <button wire:click=increment>+</button>

    <br>


    <button wire:click=resetName>Let it CHICO by a mouse</button>
    <br>
    <button wire:mouseenter=resetName>Let it CHICO by mouseenter</button>

    <h1>Hello World!</h1>

    <h1>Hello {{ $name }}</h1>

    <h1>Hello {{ strtoupper($name) }}</h1>

    <h1> {{ $count }}</h1>
    <input wire:model="name" type="text">

    <input wire:model.debounce.1000ms="name" type="text">

    lazy:
    <input wire:model.lazy="name" type="text">

    defer:
    <form action="#">

        <input wire:model.defer="name" type="text">
        <button type="submit">Submit</button>
    </form>

</div>
