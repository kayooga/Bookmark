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
        <table>
          <caption>ブックマーク一覧</caption>
          <thead>
            <tr>
              <th width="50">ID</th>
              <th>タイトル</th>
            </tr>
          </thead>
          @foreach ($bookmarks as $bookmark)
            <tr>
              <td>{{ $bookmark->id }}</td>
              <td>{{ $bookmark->title }}</td>
            </tr>
              
          @endforeach
        </table>
        <br>
        {{ $bookmarks->links() }}
      
  </x-auth-card>
</x-guest-layout>
