@component('mail::message')
Dear {{ $user->first_name }},

Thank you for trading with Lenberg Kravitz Group.

Below you can find the details of your trade:
<table class="table td-50">
    <tbody>
        <tr>
            <td>
                <strong>Action:</strong>
            </td>
            <td>{{ $action == 'buy' ? 'BUY' : 'SELL' }}</td>
        </tr>
        <tr>
            <td>
                <strong>Symbol:</strong>
            </td>
            <td>{{ $stock->symbol }}</td>
        </tr>
        <tr>
            <td>
                <strong>Company Name:</strong>
            </td>
            <td>{{ $stock->company_name }}</td>
        </tr>
        <tr>
            <td>
                <strong>Shares:</strong>
            </td>
            <td>{{ $shares }}</td>
        </tr>
        <tr>
            <td>
                <strong>Retail Price:</strong>
            </td>
            <td>{{ $stock->formatPrice($price) }}</td>
        </tr>
        @if($action == 'buy')
            <tr>
                <td>
                    <strong>Institutional Price:</strong>
                </td>
                <td>{{ $stock->formatPrice($institutional_price) }}</td>
            </tr>
        @endif
        <tr>
            <td>
                <strong>Date and Time ({{ config('app.timezone') }}):</strong>
            </td>
            <td>{{ $date->format('j F Y h:i:s A') }}</td>
        </tr>
    </tbody>
</table>

@if($action == 'buy')
Your account manager will contact you as soon as possible to arrange your documentation.
We can confirm your buy order is being processed at the institutional price.
@endif

@if($action == 'sell')
Your account manager will contact you as soon as possible to confirm best price.
We can confirm your sell order is currently being processed at the live retail price price.
@endif

If you have any questions or queries please do not hesitate to contact us on:
<li>UK - +442071 833247</li>
<li>US - +1 646 470 7895</li><br>

{{ config('app.name') }}
@endcomponent
