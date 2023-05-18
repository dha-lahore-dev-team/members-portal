<!-- The budget chapter simply shows you three tables with the budget in dollar for the 3 different phases of the project. -->
<body onload="window.print()">
<style>
    body, td{font-family:Arial, Helvetica, sans-serif;font-size:0.65em;}
    table{border:1px solid black;width:100%;border-collapse:collapse;}
</style>

<table>
    <tr>
        <td width="11%" style="border:1px solid black; background-color:#A8A8A8;"><div align="center">DEPOSITOR'S COPY </div></td>
        <td colspan="8" style="font-size:16px; color:#059862;"><div align="center">DEFENCE HOUSING AUTHORITY LAHORE CANTT </div></td>
        <td width="9%" rowspan="3"><div align="right"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="8" style="font-size:16px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="12%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
    </tr>
    <tr>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td>&nbsp;</td>
        <td><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td colspan="4" style="border:1px solid black;"><div align="center"><strong>PARTICULARS</strong></div></td>
        <td style="border:1px solid black;"><div align="center"><strong>AMOUNT (RS) </strong></div></td>
    </tr>
    <tr>
        <td><strong>PLOT NO:</strong></td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="10" style="border:1px solid black; vertical-align: top;">{{$find->CH_CODE_DESCRIPTION}}</td>
        <td rowspan="10" style="border:1px solid black;">&nbsp;</td>
    </tr>
    <tr>
        <td><strong>NAME:</strong></td>
        <td colspan="4">{{$find->MEM_NAME}} </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>ISSUE DATE: </strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td>{{$find->DUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><strong>SIGNATURE / BANK STAMP: </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" style="border:1px solid black;"><strong>TOTAL AMOUNT WITHIN DUE DATE </strong></td>
        <td style="border:1px solid black;"><div align="right"><strong>{{$find->TOT_AMT}}</strong></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="2" style="border:1px solid black;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
        <td rowspan="2" style="border:1px solid black;">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
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
        <td style="border:1px solid black; background-color:#FFBF00;"><div align="center">BANK COPY </div></td>
        <td colspan="8" style="font-size:16px; color:#059862;"><div align="center">DEFENCE HOUSING AUTHORITY LAHORE CANTT </div></td>
        <td rowspan="3"><div align="right"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="8" style="font-size:16px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
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
        <td rowspan="6"><div align="center"><strong>SIGNATURE / BANK STAMP:</strong></div></td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>PLOT NO:</strong></td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>NAME:</strong></td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (RS) </strong></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{$find->AMOUNT}}</strong></div></td>
    </tr>
    <tr>
        <td><strong>ISSUE DATE:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="2" style="border:1px solid black;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td>{{$find->DUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
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
        <td style="border:1px solid black; background-color:#6495ED;"><div align="center">MEMBER FILE COPY </div></td>
        <td colspan="8" style="font-size:16px; color:#059862;"><div align="center">DEFENCE HOUSING AUTHORITY LAHORE CANTT </div></td>
        <td rowspan="3"><div align="right"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="8" style="font-size:16px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
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
        <td rowspan="6"><div align="center"><strong>SIGNATURE / BANK STAMP:</strong></div></td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>PLOT NO:</strong></td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>NAME:</strong></td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (RS) </strong></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{$find->AMOUNT}}</strong></div></td>
    </tr>
    <tr>
        <td><strong>ISSUE DATE:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="2" style="border:1px solid black;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td>{{$find->DUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
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
        <td style="border:1px solid black;"><div align="center">FIN BRANCH  COPY</div></td>
        <td colspan="8" style="font-size:16px; color:#059862;"><div align="center">DEFENCE HOUSING AUTHORITY LAHORE CANTT </div></td>
        <td rowspan="3"><div align="right"><img src="{{asset('front/dist/img/dha-logo.png')}}" alt="logo" width="50" height="50" /></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="8" style="font-size:16px;"><div align="center">PAYMENT CHALLAN FORM </div></td>
    </tr>
    <tr>
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
        <td rowspan="6"><div align="center"><strong>SIGNATURE / BANK STAMP:</strong></div></td>
        <td><strong>CHALLAN NO:</strong></td>
        <td><strong>{{$find->CH_NO}}</strong></td>
        <td><strong>REF NO:</strong></td>
        <td><strong>{{$find->REF_NO}}</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>PLOT NO:</strong></td>
        <td>{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>NAME:</strong></td>
        <td colspan="3">{{$find->MEM_NAME}} </td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>AMOUNT (RS) </strong></div></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" style="border:1px solid black;"><div align="right"><strong>{{$find->AMOUNT}}</strong></div></td>
    </tr>
    <tr>
        <td><strong>ISSUE DATE:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="2" style="border:1px solid black;"><strong>{{$find->AMT_IN_WORDS}}</strong></td>
    </tr>
    <tr>
        <td><strong>DUE DATE:</strong></td>
        <td>{{$find->DUE_DATE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
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
