<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="" href="" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }
        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        tr {border-bottom: 1px dotted #ddd;}
        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}

        @media print {
            * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }
            @page { margin: 1.5cm 0.5cm 0.5cm; }
            @page:first { margin-top: 0.5cm; }
            tbody::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;        
            }
        }
    </style>
  </head>
<body>

<div style="max-width:400px;margin:0 auto">
    
    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a> </td>
                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> Print</button></td>
            </tr>
        </table>
        <br>
    </div>
        
    <div id="receipt-data">
        <div class="centered">
            
            
            <p>Address: Jl. sesama
                <br>no telepon: 089232420
            </p>
        </div>
        <p>Tanggal: 12 januari 2023<br>
            no referensi: CDEKJH<br>
            Customer: rudi
        </p>
        <table class="table-data">
            <tbody>
              
              <tr>
                  <td colspan="2" style="text-align:left">air mineral</td>
                  <td style="text-align:right">10000</td>
              </tr>


              <tr>
                    <th colspan="2" style="text-align:left">total</th>
                    <th style="text-align:right">asdasd</th>
              </tr>
               
            
               
               
              
                
                
                <tr>
                    <th colspan="2" style="text-align:left">Total semua</th>
                    <th style="text-align:right">70000</th>
                </tr>
                <tr>
                    <th class="centered" colspan="3">Kata: <span>IDR to USD</span> <span>dua juta</span></th>
                </tr>
            </tbody>
            <!-- </tfoot> -->
        </table>
        <table>
            <tbody>
                <tr style="background-color:#ddd;">
                    <td style="padding: 5px;width:30%">paid by: </td>
                    <td style="padding: 5px;width:40%">amount : 20000</td>
                    <td style="padding: 5px;width:30%">change : 2000</td>
                </tr>                
                <tr><td class="centered" colspan="3">Thank you for shopping with us. Please come again</td></tr>
                <tr>
                    <td class="centered" colspan="3"> asds </td>
                </tr>
            </tbody>
        </table>
       
    </div>
</div>

<script type="text/javascript">
        window.print()
</script>

</body>
</html>
