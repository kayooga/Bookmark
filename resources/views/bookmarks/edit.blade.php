<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

      <form action="{{ route('user.bookmarks.update',$bookmark->id) }}" method="post">
        <input type="hidden" name="id" value="{{$bookmark->id}}">
        @method('POST')
        @csrf
        @include('bookmarks.fields')

      </form>
      
  </x-auth-card>
</x-guest-layout>
