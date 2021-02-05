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
      <div class="mb-3">  
        <a href="{{ route('bookmarks.create') }}" class="btn-primary">新規登録</a>
      </div>

        <table>
          <caption>ブックマーク一覧</caption>
          <thead>
            <tr>
              <th width="50">ID</th>
              <th>タイトル</th>
              <th>アクション</th>
            </tr>
          </thead>
          @foreach ($bookmarks as $bookmark)
            <tr>
              <td>{{ $bookmark->id }}</td>
              <td><a href="{{ $bookmark->url }}">{{ $bookmark->title }}</a></td>
              <td>
              <a href="{{ route('bookmarks.show',$bookmark->id) }}" class="btn btn-secondary btn-sm">表示</a>
                <a href="{{ route('bookmarks.edit',$bookmark->id) }}" class="btn btn-secondary btn-sm">編集</a>
                <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="post">
                  
                  @csrf
                  <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm">削除</button>
                </form>
              </td>
            </tr>
              
          @endforeach
        </table>
        <br>
        {{ $bookmarks->links() }}
      
  </x-auth-card>
</x-guest-layout>
