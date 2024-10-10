<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ Chatify::getUserWithAvatar($user)->avatar }}');">
        </div>
        <p>{{ strlen($user->fname . " " . $user->lname) > 5 ? substr($user->fname . " " . $user->lname, 0, 6).'..' : $user->fname . " " . $user->lname }}</p>
    @endif
</div>
