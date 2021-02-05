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
          <caption>ブックマーク詳細</caption>
            <tr>
              <th width="80">タイトル</th>
              <td>{{ $bookmark->title }}</td>
            </tr>
            <tr>
              <th>URL</th>
              <td><a href="{{ $bookmark->url }}">{{ $bookmark->url }}</a></td>
            </tr>
            <tr>
              <th>概要</th>
              <td>{{ $bookmark->description }}</td>
            </tr>
            <tr>
              <th>作成日</th>
              <td>{{ $bookmark->created_at->format('Y年m月d日') }}</td>
            </tr>
        </table>
        <div>
          <a href="{{ route('bookmarks.index')}}" class="btn btn-secondary">戻る</a>
        </div>
      
  </x-auth-card>
</x-guest-layout>
