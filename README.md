https://laravel-livewire.com/screencasts/installation

https://laravel-livewire.com/docs/2.x/reference

---

Alpine js CDN:

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

For production environments, it's recommended to pin a specific version number in the link to avoid unexpected breakage from newer versions. For example, to use version 2.7.0 (latest):

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>

From NPM: Install the package from NPM.

npm i alpinejs

Include it in your script.

import 'alpinejs'

---

2.2
composer require livewire/livewire

Include the JavaScript (on every page that will be using Livewire).

...
@livewireStyles
or
<livewire:styles />

</head>
<body>
...

    @livewireScripts
    <livewire:scripts>

</body>
</html>
---
1.3
composer require laravel/jetstream

// Install Jetstream with the Livewire stack...
php artisan jetstream:install livewire

// Install Jetstream with the Inertia stack...
php artisan jetstream:install inertia

If you are starting a brand new application and would like to include the authentication scaffolding, you may use the --jet directive when creating your application via the Laravel Installer. This command will create a new application with all of the authentication scaffolding compiled and installed:

laravel new kitetail --jet

When using Laravel Jetstream, the Jetstream installation process will change the value of the HOME constant to /dashboard.

---

Run the following command to generate a new Livewire component called counter.

php artisan make:livewire counter
(You can use both livewire:make and make:livewire to create the component)

---

Template Directives

These are directives added to elements within Livewire component templates.

wire:key="foo" Acts as a reference point for Livewire's DOM diffing system. Useful for adding/removing elements, and keeping track of lists.
wire:click="foo" Listens for a "click" event, and fires the "foo" method in the component.
wire:click.prefetch="foo" Listens for a "mouseenter" event, and "prefetches" the result of the "foo" method in the component. Then, if it is clicked, will swap in the "prefetched" result (without an extra request), if it's not clicked, will throw away the cached result.
wire:keydown.enter="foo" Listens for a keydown event on the enter key, which fires the "foo" method in the component.
wire:foo="bar" Listens for a browser event called "foo". (You can listen for any browser DOM event - not just those fired by Livewire).
wire:model="foo" Assuming \$foo is a public property on the component class, every time an input element with this directive is updated, the property synchronizes with its value.
wire:model.debounce.100ms="foo" Debounces the input events emitted by the element every 100 milliseconds.
wire:model.lazy="foo" Lazily syncs the input with its corresponding component property at rest.
wire:model.defer="foo" Deferrs syncing the input with the Livewire property until an "action" is performed. This saves drastically on server roundtrips.
wire:poll.500ms="foo" Runs the "foo" method on the component class every 500 milliseconds.
wire:init="foo" Runs the "foo" method on the component immediately after it renders on the page.
wire:loading Hides the element by default, and makes it visible while network requests are in transit.
wire:loading.class="foo" Adds the foo class to the element while network requests are in transit.
wire:loading.class.remove="foo" Removes the foo class while network requests are in transit.
wire:loading.attr="disabled" Adds the disabled="true" attribute while network requests are in transit.
wire:dirty Hides the element by default, and makes it visible while the element's state is "dirty" (different from what exists on the backend).
wire:dirty.class="foo" Adds the foo class to the element while it's dirty.
wire:dirty.class.remove="foo" Removes the foo class while the element is dirty.
wire:dirty.attr="disabled" Adds the disabled="true" attribute while the element's dirty.
wire:target="foo" Scopes wire:loading and wire:dirty functionality to a specific action.
wire:ignore Instructs Livewire to not update the element or its children when updating the DOM from a server request. Useful when using third-party JavaScript libraries within Livewire components.
wire:ignore.self The "self" modifier restricts updates to the element itself, but allows modifications to its children.

---

if need configuration:

php artisan livewire:publish

---

Making Components

Run the following artisan command to create a new Livewire component:

php artisan make:livewire ShowPosts

Livewire also supports "kebab" notation for new components.

php artisan make:livewire show-posts

---

The most basic way to render a Livewire component on a page is using the <livewire: tag syntax:

<div>
    <livewire:show-posts />
</div>

Alternatively you can use the @livewire blade directive:

@livewire('show-posts')

---

artisan make:livewire delete-post --inline

---

Because Livewire works with Laravel's redirection system, you can use any notation you are used to like redirect('/foo'), redirect()->to('/foo'), redirect()->route('foo').

---

Interacting With Livewire From Alpine: \$wire

From any Alpine component inside a Livewire component, you can access a magic \$wire object to access and manipulate the Livewire component.

To demonstrate it's usage, we'll create a "counter" component in Alpine that uses Livewire completely under the hood:

class Counter extends Component
{
public \$count = 0;

    public function increment()
    {
        $this->count++;
    }

}

<div>
    <!-- Alpine Counter Component -->
    <div x-data>
        <h1 x-text="$wire.count"></h1>

        <button x-on:click="$wire.increment()">Increment</button>
    </div>

</div>

Now, when a user clicks "Increment", the standard Livewire roundtrip will trigger and Alpine will reflect Livewire's new \$count value.

---

https://tailwindcss.com/docs/upcoming-changes

We highly recommend opting-in to these changes now to simplify upgrading Tailwind in the future.

Remove deprecated gap utilities

Tailwind v1.7.0 introduced new gap-x-{n} and gap-y-{n} utilities to replace the existing col-gap-{n} and row-gap-{n} utilities. We currently include both by default, but the old utilities will be removed in v2.0.

To opt-in to removing them now, use the removeDeprecatedGapUtilities flag:

// tailwind.config.js
module.exports = {
future: {
removeDeprecatedGapUtilities: true,
},
// ...
}
so this will be the result:

const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
future: {
removeDeprecatedGapUtilities: true,
purgeLayersByDefault: true
},
purge: [
"./vendor/laravel/jetstream/**/*.blade.php",
"./storage/framework/views/*.php",
"./resources/views/**/*.blade.php"
],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans]
            }
        }
    },

    variants: {
        opacity: ["responsive", "hover", "focus", "disabled"]
    },

    plugins: [require("@tailwindcss/ui")]

};
