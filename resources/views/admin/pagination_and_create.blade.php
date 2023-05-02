<div>
    {{$data[$data['class_name']]->withQueryString()->onEachSide(2)->links()}}
    <a style="position: relative; left: 1560px;" href="{{ route("admin.{$data['class_name']}.create") }}"><button type="button" class="btn  btn-info">Create</button></a>
</div>
