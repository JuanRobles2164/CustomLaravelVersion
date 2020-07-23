
@extends('Layout')

@section('content') 

        <x-form_post> 
                <x-basic_input attr_name='id' input_type='number' input_name='id'/>
                <x-basic_input attr_name='obligatorio' input_type='text' input_name='obligatorio'/>
                <x-basic_input attr_name='opcional' input_type='text' input_name='opcional'/>
                <x-basic_input attr_name='fecha_date' input_type='date' input_name='fecha_date'/>
                <x-basic_input attr_name='booleano' input_type='checkbox' input_name='booleano'/>
                <x-basic_input attr_name='direccion_ip' input_type='text' input_name='direccion_ip'/>
                <x-basic_input attr_name='flotante' input_type='number' input_name='flotante' step_calculus='0.01'/>
                <x-basic_input attr_name='created_at' input_type='datetime-local' input_name='created_at' step_calculus='0.01'/>
                <x-basic_input attr_name='updated_at' input_type='datetime-local' input_name='updated_at' step_calculus='0.01'/>
                <x-form_select_list attr_name='id'/><br>
                <x-form_select_list attr_name='name'/><br>
                <x-form_select_list attr_name='email'/><br>
                <x-form_select_list attr_name='email_verified_at'/><br>
                <x-form_select_list attr_name='password'/><br>
                <x-form_select_list attr_name='remember_token'/><br>
                <x-form_select_list attr_name='created_at'/><br>
                <x-form_select_list attr_name='updated_at'/><br>
        </x-form_post>
@endsection 

        