@extends('prints.layouts.paper')

@section('title')
Form Manufacture List
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
    .table-avatar {
        width: 50px;
        height: 50px;
    }
</style>
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    PHONETN.COM<br />
                    http://phonetn.com/<br />
                    (+123) 123 321 345 # 01.222.888.999<br />
                    <img style="width: 80px;" src="{{ asset('/storage/images/admin/logos/logo1.png') }}" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($manufactures)/5);
        ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Manufacture List</caption>
            <tr>
                <th colspan="6" align="center">Page 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Logo</th>
            </tr>
            @foreach ($manufactures as $mn)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $mn->mnf_name }}</td>             
                <td align="center">
                    <img class="table-avatar" src="{{ asset('storage/images/manufactures/' .$mn->mnf_logo) }}" />
                </td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Page {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Logo</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection