@if ($flag == 'category')
    <option selected="selected" value="">Select Category</option>
    @foreach ($models as $model )
        <option value="{{$model->id}}">{{ $model->category }}</option>
    @endforeach
@endif