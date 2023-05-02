<tr>
    <th>
        <div class="card-header">
            <h3 class="card-title">{{ $data[$data['class_name']][0] ? strtoupper($data[$data['class_name']][0]->getTable()) : 'Null' }}
                {{ isset($data['request']['post_search']) ? ' search: ' : ' all: ' }} {{$data[$data['class_name']]->total()}}</h3>

                <div class="card-tools">
                    <form action="{{ route("admin.{$data['class_name']}.index") }}" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="post_search" class="form-control float-right" placeholder="Search" value="{{
    $data['request']['post_search'] ?? ''
}}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

        </div>
    </th>
</tr>

