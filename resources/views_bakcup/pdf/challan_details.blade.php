<!-- The budget chapter simply shows you three tables with the budget in dollar for the 3 different phases of the project. -->
<body onLoad="window.print()">
<style>
    body, td{font-family:Times New Roman, Times, serif;font-size:0.60em;}
    table{border:0px solid black;width:100%;border-collapse:collapse;}
</style>

<table>
    <tr>
        <td colspan="3" style="border:1px solid black; background-color:#A8A8A8; font-size:11px;"><div align="center"><strong>DEPOSITOR'S COPY</strong></div></td>
        <td colspan="8" style="font-size:18px; color:#059862;"><div align="center"><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT </strong></div></td>
        <td width="8%" rowspan="3" align="right" style="vertical-align: top;"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></td>
        <td width="1%" rowspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td width="3%">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="8" style="font-size:18px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" style="font-size: 8px; text-align:right">WEB GENERATED</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="17%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2"><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td style="text-align:right;"><strong>REF NO:</strong></td>
        <td>&nbsp;</td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td colspan="4" style="border:1px solid black;"><div align="center"><strong>PARTICULARS</strong></div></td>
        <td style="border:1px solid black;"><div align="center"><strong>AMOUNT (Rs)</strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">PLOT NO:</td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="10" style="border:1px solid black; vertical-align: top;">{{$find->CH_CODE_DESCRIPTION}}</td>
        <td rowspan="10" style="border:1px solid black; vertical-align:top; text-align:right"><strong>{{number_format($find->TOT_AMT)}}</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">NAME:</td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">ISSUE DATE: </td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2"><strong>DUE DATE:</strong></td>
        <td><strong>{{$find->DUE_DATE}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="4"><strong>SIGNATURE / BANK STAMP</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" style="border:1px solid black; font-size:9px;"><strong>TOTAL AMOUNT (WITHIN DUE DATE)</strong></td>
        <td style="border:1px solid black;"><div align="right"><strong>{{number_format($find->TOT_AMT)}}</strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="2" style="border:1px solid black; font-size:9px;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
        <td rowspan="2" style="border:1px solid black;">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" style="border:1px solid black; background-color:#FFBF00; font-size:11px;"><div align="center"><strong>BANK COPY </strong></div></td>
        <td colspan="8" style="font-size:18px; color:#059862;"><div align="center"><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT </strong></div></td>
        <td width="8%" rowspan="3" align="right" style="vertical-align: top;"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></td>
        <td rowspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="8" style="font-size:18px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="6" style="border:1px solid black; text-align:center; font-size:8px;">SIGNATURE / BANK STAMP</td>
        <td width="4%" rowspan="6" style=" text-align:center; font-size:8px;">&nbsp;</td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td>&nbsp;</td>
        <td style="text-align:center;"><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>

        <td>PLOT NO:</td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>NAME:</td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (Rs) </strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{number_format($find->TOT_AMT)}}</strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>ISSUE DATE:</td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black; font-size:9px;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td><strong>{{$find->DUE_DATE}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" style="border:1px solid black; background-color:#6495ED; font-size:11px;"><div align="center"><strong>MEMBER FILE COPY </strong></div></td>
        <td colspan="8" style="font-size:18px; color:#059862;"><div align="center"><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT </strong></div></td>
        <td width="8%" rowspan="3" align="right" style="vertical-align: top;"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></td>
        <td rowspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="8" style="font-size:18px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="6" style="border:1px solid black; text-align:center; font-size:8px;">SIGNATURE / BANK STAMP</td>
        <td rowspan="6">&nbsp;</td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td>&nbsp;</td>
        <td style="text-align:center;"><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>PLOT NO:</td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>NAME:</td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (Rs) </strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{number_format($find->TOT_AMT)}}</strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>ISSUE DATE:</td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black; font-size:9px;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td>{{$find->DUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" style="border:1px solid black; font-size:11px;"><div align="center"><strong>FIN BRANCH COPY</strong></div></td>
        <td colspan="8" style="font-size:18px; color:#059862;"><div align="center"><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT </strong></div></td>
        <td width="8%" rowspan="3" align="right" style="vertical-align: top;"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></td>
        <td rowspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td colspan="8" style="font-size:18px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="6" style="border:1px solid black; text-align:center; font-size:8px;">SIGNATURE / BANK STAMP</td>
        <td rowspan="6">&nbsp;</td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td>&nbsp;</td>
        <td style="text-align:center;"><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>PLOT NO:</td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>NAME:</td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (Rs) </strong></div></td>
        <td >&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{number_format($find->TOT_AMT)}}</strong></div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>ISSUE DATE:</td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black; font-size:9px;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td><strong>{{$find->DUE_DATE}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
