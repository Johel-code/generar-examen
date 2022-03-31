

<div class="form-check form-switch">
    <style>
        .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
        }
    
    
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }
    
    
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }
    
        .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }
    
        input:checked + .slider {
        background-color: #f37521;
        }
    
        input:focus + .slider {
        box-shadow: 0 0 1px #f37521;
        }
    
        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }
    
    
        .slider.round {
        border-radius: 34px;
        }
    
        .slider.round:before {
        border-radius: 50%;
        }
    </style>
    <label class="switch">
        <input wire:model="isActive" class="form-check-input" type="checkbox" id="{{$field.$faculty->id}}">
        <span for="{{ $field.$faculty->id }}" class="slider round"></span>
    </label>
</div>

