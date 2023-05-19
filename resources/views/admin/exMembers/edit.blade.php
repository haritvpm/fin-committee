@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exMember.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ex-members.update", [$exMember->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col">
                <div class="form-group">
                            <label class="required" for="index">{{ trans('cruds.exMember.fields.index') }}</label>
                            <input readonly class="form-control {{ $errors->has('index') ? 'is-invalid' : '' }}" type="number" name="index" id="index" value="{{ old('index', $exMember->index) }}" step="1" required>
                            @if($errors->has('index'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('index') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.index_helper') }}</span>
                        </div>
                </div>
                <div class="col">
                    <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.exMember.fields.user') }}</label>
                            
                            <select class="form-control  {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $exMember->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.user_helper') }}</span>
                        </div>
                </div>
            </div>

          
           
   
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.exMember.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $exMember->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.exMember.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="address">{{ trans('cruds.exMember.fields.address') }}</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address', $exMember->address) }}</textarea>
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.exMember.fields.address_helper') }}</span>
                </div>
           

            <div class="row">
                <div class="col">
                <div class="form-group">
                            <label class="required" for="place">{{ trans('cruds.exMember.fields.place') }}</label>
                            <input class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" type="text" name="place" id="place" value="{{ old('place', $exMember->place) }}" required>
                            @if($errors->has('place'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('place') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.place_helper') }}</span>
                        </div>
                </div>
                <div class="col">
                <div class="form-group">
                            <label class="required" for="district">{{ trans('cruds.exMember.fields.district') }}</label>
                            <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', $exMember->district) }}" required>
                            @if($errors->has('district'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('district') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.district_helper') }}</span>
                        </div>
                </div>
            </div>
           
           
            <div class="row">
                <div class="col">
                <div class="form-group">
                            <label class="required" for="distance_oneside">{{ trans('cruds.exMember.fields.distance_oneside') }}</label>
                            <input class="form-control {{ $errors->has('distance_oneside') ? 'is-invalid' : '' }}" type="number" name="distance_oneside" id="distance_oneside" value="{{ old('distance_oneside', $exMember->distance_oneside) }}" step="1" required>
                            @if($errors->has('distance_oneside'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('distance_oneside') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.distance_oneside_helper') }}</span>
                        </div>
                </div>
                <div class="col">
                <div class="form-group">
                            <label for="distance_2side">Total Distance</label>
                            <input readonly class="form-control type="number" name="distance_total" id='distance_total' value="{{ old('distance_total', $exMember->distance_total) }}" step="1">
                         
                        </div>
                
                </div>
            </div>
           

            <div class="row">
                <div class="col">
                <div class="form-group">
                            <label for="ta_calculated">{{ trans('cruds.exMember.fields.ta_calculated') }}</label>
                            <input readonly class="form-control {{ $errors->has('ta_calculated') ? 'is-invalid' : '' }}" type="number" name="ta_calculated" id="ta_calculated" value="{{ old('ta_calculated', $exMember->ta_calculated) }}" step="0.01">
                            
                        </div>
                </div>
                <div class="col">
                <div class="form-group">
                            <label for="ta_eligible">{{ trans('cruds.exMember.fields.ta_eligible') }}</label>
                            <input readonly class="form-control {{ $errors->has('ta_eligible') ? 'is-invalid' : '' }}" type="number" name="ta_eligible" id="ta_eligible" value="{{ old('ta_eligible', $exMember->ta_eligible) }}" step="0.01">
                        
                        </div>
                </div>
                <div class="col">
                
                <div class="form-group">
                            <label for="honorarium">{{ trans('cruds.exMember.fields.honorarium') }}</label>
                            <input readonly class="form-control {{ $errors->has('honorarium') ? 'is-invalid' : '' }}" type="number" name="honorarium" id="honorarium" value="{{ old('honorarium', $exMember->honorarium) }}" step="0.01">
                            @if($errors->has('honorarium'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('honorarium') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.exMember.fields.honorarium_helper') }}</span>
                </div>

                </div>
                <div class="col">
                <div class="form-group">
                <label for="amount_payable">{{ trans('cruds.exMember.fields.amount_payable') }}</label>
                <input readonly class="form-control {{ $errors->has('amount_payable') ? 'is-invalid' : '' }}" type="number" name="amount_payable" id="amount_payable" value="{{ old('amount_payable', $exMember->amount_payable) }}" step="0.01">
                @if($errors->has('amount_payable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_payable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exMember.fields.amount_payable_helper') }}</span>
                </div>
            </div>

            </div>

          <!--   <div class="form-group">
                <label for="actual_amount_paid">Actual Amount Paid</label>
                <input class="form-control {{ $errors->has('actual_amount_paid') ? 'is-invalid' : '' }}" type="number" name="actual_amount_paid" id="actual_amount_paid" value="{{ old('actual_amount_paid', $exMember->actual_amount_paid) }}" step="0.01">
            </div> -->
            <div class="form-group">
                <label for="amount_words">{{ trans('cruds.exMember.fields.amount_words') }}</label>
                <input class="form-control {{ $errors->has('amount_words') ? 'is-invalid' : '' }}" type="text" name="amount_words" id="amount_words" value="{{ old('amount_words', $exMember->amount_words) }}">
                @if($errors->has('amount_words'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_words') }}
                    </div>
                @endif
               
            </div>
            

            <div class="form-group">
                <div class="form-check {{ $errors->has('amount_paid') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="amount_paid" value="0">
                    <input class="form-check-input" type="checkbox" name="amount_paid" id="amount_paid" value="1" {{ $exMember->amount_paid || old('amount_paid', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="amount_paid">{{ trans('cruds.exMember.fields.amount_paid') }}</label>
                </div>
                @if($errors->has('amount_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exMember.fields.amount_paid_helper') }}</span>
            </div>




            <div class="form-group">
              

                <a class="btn btn-primary" href="{{ route('admin.ex-members.show', $exMember->id) }}">
                                       Cancel
                                    </a>

                                    
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>


            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
@parent
<script type="text/javascript">
$(document).ready(function()
{

    function price_in_words(price) {
  var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
    dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
    tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
    handle_tens = function(dgt, prevDgt) {
      return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
    },
    handle_utlc = function(dgt, nxtDgt, denom) {
      return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
    };

  var str = "",
    digitIdx = 0,
    digit = 0,
    nxtDigit = 0,
    words = [];
  if (price += "", isNaN(parseInt(price))) str = "";
  else if (parseInt(price) > 0 && price.length <= 10) {
    for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
      case 0:
        words.push(handle_utlc(digit, nxtDigit, ""));
        break;
      case 1:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 2:
        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
        break;
      case 3:
        words.push(handle_utlc(digit, nxtDigit, "Thousand"));
        break;
      case 4:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 5:
        words.push(handle_utlc(digit, nxtDigit, "Lakh"));
        break;
      case 6:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 7:
        words.push(handle_utlc(digit, nxtDigit, "Crore"));
        break;
      case 8:
        words.push(handle_tens(digit, price[digitIdx + 1]));
        break;
      case 9:
        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
    }
    str = words.reverse().join("")
  } else str = "";
  return str

}

    function updateFields()
    {        
        var total = 0;
        var ta_cal = 0;
        var ta_eli = 0
        var amount = 0
        var words = ''
        var km = parseFloat($("#distance_oneside").val());

        if( km ) {
            total = (km ) * 2;
            total = total.toFixed(1);
            ta_cal = total * 10;
            
            ta_eli = Math.max(1000, total * 10);
            amount = ta_eli + 2500 ;
            words = 'Rupees ' + price_in_words(amount).trim() + ' Only'
        }

        $("#distance_total").val(total);
        $("#ta_calculated").val(ta_cal);
        $("#ta_eligible").val(ta_eli);
        $("#amount_payable").val(amount);
        $("#amount_words").val(words);
                                
    }
    $(document).on("change, keyup", "#distance_oneside", updateFields);
});

</script>
@endsection