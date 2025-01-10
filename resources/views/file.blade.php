<?php

?>
<a href="{{asset('storage/file1.txt')}}" download>test</a>
<div class="registration-cssave">
    <form action="{{ route('file')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name ="file">
        <button type="submit" class="actions-buttom actions-buttom--save">Сохранить и добавить станок на сайт</button>
    </form>
</div>
