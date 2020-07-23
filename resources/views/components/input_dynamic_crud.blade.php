<div class="">
        @foreach ($model_attributes[0] as $name => $data_type)
            @switch($data_type)
                @case('longtext')
                        
                    @break
                @case('fk')

                    @break
                @default
                    <x-basic_input attr_name="" input_type="{{$data_type}}" input_name=""/>
            @endswitch
        @endforeach
</div>