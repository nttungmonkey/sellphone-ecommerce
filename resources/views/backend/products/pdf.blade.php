<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .hinhSanPham {
            width: 100px;
            height: 100px;
        }

        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .companyImg {
            width: 100px;
            height: 100px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    PHONETN<br />
                    http://phonetn.com/<br />
                    (+123) 123 321 345 # 01.222.888.999<br />
                    <img src="{{ public_path('storage\images\admin\logos\logo1.png') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($products)/5);
         ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Products</caption>
            <tr>
                <th colspan="6" align="center">Pgae 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Sku</th>
                <th>Name</th>
                <th>Models</th>
                <th>Supplier</th>
                <th>Image</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $product->pro_sku }}</td>
                <td align="right">{{ $product->pro_name }}</td>
                @foreach ($models as $model)
                @if ($product->mod_id == $model->mod_id)
                <td align="left">{{ $model->mod_name }}</td>
                @endif
                @endforeach
                @foreach ($suppliers as $supplier)
                @if ($product->sup_id == $supplier->sup_id)
                <td align="left">{{ $supplier->sup_name }}</td>
                @endif
                @endforeach
                <td align="center">
                    <img class="hinhSanPham" src="{{ public_path('storage/images/products/' .$product->models->mod_name.'/'.$product->pro_image) }}" />
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
                <th>Sku</th>
                <th>Name</th>
                <th>Models</th>
                <th>Supplier</th>
                <th>Image</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>