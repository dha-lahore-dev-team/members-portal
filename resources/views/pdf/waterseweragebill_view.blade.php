<!-- The budget chapter simply shows you three tables with the budget in dollar for the 3 different phases of the project. -->
<!--<body onLoad="window.print()">
<style>
    body, td{font-family:Times New Roman, Times, serif;font-size:0.60em;}
    table{border:0px solid black;width:100%;border-collapse:collapse;}
</style>-->
<style >
    body, td{font-family:Arial, Helvetica, sans-serif;font-size:0.50em;}
    td{boder-right:1px solid black;}
    .amount_section{line-height:5px;margin-top:5px; font-size:9px;}
    table{border:0px solid black;width:98%;border-collapse:collapse;}
    .row-border{border:1px solid black;}
    h3{font-size:11px;margin:0px;padding:0px;}
    .style1 {font-weight: bold}
</style>
<table>
                <tr>
                  <td colspan="2" rowspan="5">
                    <div align="center"><img src={{asset('front/dist/img/water_bill/dha-logo.png')}} height="50" alt="logo"></div>        </td>
                  <td colspan="11">&nbsp;</td>
                </tr>
            <tr>
              <td colspan="11">&nbsp;</td>
            </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>LONG LIVE PAKISTAN</strong></h3>
            </div>        </td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT</strong></h3>
            </div>        </td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>WATER / SEWERAGE BILL</strong></h3>
            </div>        </td>
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
      <td colspan="4"></td>
    </tr>
    <tr>
        <td width="8%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="8%">&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="0%">&nbsp;</td>
        <td width="6%">&nbsp;</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Bill No.</strong></td>
        <td>{{$find->BILL_NO}}</td>
        <td colspan="3">&nbsp;</td>
        <td width="28%"><div align="right" style="font-size:8px"><strong>WEB GENERATED BILL</strong></div></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Ref. No.</strong></td>
        <td colspan="2">{{$find->CUST_REF_NO}}</td>
        <td><strong>Customer ID</strong></td>
        <td>{{$find->CUST_ID}}</td>
        <td colspan="2"><strong>Meter No.</strong></td>
        <td>{{$find->METER_NO}}</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Connection Type:</strong></td>
        <td>{{$find->PLOT_TYPE_DESC}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Plot / House No.</strong></td>
        <td colspan="2">{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Issue Date:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Period From:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->FROM_DATE))}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Name:</strong></td>
        <td colspan="2">{{$find->BILL_TITLE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Due Date:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->DUE_DATE))}}</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Period To:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->TO_DAT))}}</td>
    </tr>
    <tr>
        <td class="row-border" colspan="2" bgcolor="#999999">
            <div align="center"><strong>Cost of Water (Rs)</strong></div>        </td>
        <td class="row-border" rowspan="2" bgcolor="#999999">
            <div align="center"><strong>Aquifer Charges (Rs)</strong></div>        </td>
        <td class="row-border" rowspan="2" bgcolor="#999999">
            <div align="center"><strong>Flat Rate Charges (Rs) </strong></div>        </td>
        <td class="row-border" rowspan="2" bgcolor="#999999">
            <div align="center"><strong>Total Water Cost (Rs) </strong></div>        </td>
        <td class="row-border" rowspan="2" bgcolor="#999999">
            <div align="center"><strong>Meter / Installment Charges (Rs) </strong></div>        </td>
        <td>&nbsp;</td>
        <td colspan="6">
            <table width="100%" border="1">
                <tr bgcolor="#999999">
                    <td colspan="6">
                        <div align="center"><strong>Meter Readings</strong> </div>                    </td>
                </tr>
                <tr bgcolor="#999999">
                    <td>
                        <div align="center"><strong>Reading Date </strong></div>                    </td>
                    <td>
                        <div align="center"><strong>Current</strong></div>                    </td>
                    <td>
                        <div align="center"><strong>Previous</strong></div>                    </td>
                    <td>
                        <div align="center"><strong>MF</strong></div>                    </td>
                    <td>
                        <div align="center"><strong>Rate (Rs) </strong></div>                    </td>
                    <td>
                        <div align="center"><strong>Vol Consumed (m3) </strong></div>                    </td>
                </tr>
                <tr>
                    <td><div align="center">{{date("d-M-Y", strtotime($find->MTR_READ_DATE))}}</div></td>
                    <td><div align="center">{{number_format($find->CURRENT_READING,3)}}</div></td>
                    <td><div align="center">{{number_format($find->PREVIOUS_READING,3)}}</div></td>
                    <td><div align="center">{{$find->MF}}</div></td>
                    <td><div align="center">{{$find->RATE}}</div></td>
                    <td><div align="center">{{$find->TOT_CUBIC_CONSUMPTION}}</div></td>
                </tr>
            </table>        </td>
    </tr>
    <tr>
        <td class="row-border" bgcolor="#999999">
            <div align="center"><strong>Line Rent</strong></div>        </td>
        <td class="row-border" bgcolor="#999999">
            <div align="center"><strong>Vol Based </strong></div>        </td>
        <td>&nbsp;</td>
	<?php if($find->PST_INST == '0'){?>
    		<td colspan="6" rowspan="4"></td>
	<?php } else{ ?>
 		<td colspan="6" rowspan="4">
		<table border="0">
              		<tr class="psts">
                		<td rowspan="2">* PSTS as per clause 15 of the 2nd Schedule of Punjab Sales Tax on Services Act, 2012</td>
                		<td><div align="center">Current Rs.</div></td>
                		<td><div align="center">Paid Rs.</div></td>
              		</tr>
              		<tr class="psts">
                		<td><div align="center">{{number_format($find->PST_INST)}}</div></td>
                		<td><div align="center">0</div></td>
              		</tr>
            	</table>
           	 </td>
<?php } ?>
    </tr>
    <tr>
        <td class="row-border" rowspan="2" >
            <div align="center">{{number_format($find->WATER_FIXED)}}</div>        </td>
        <td class="row-border" rowspan="2">
            <div align="center">{{number_format($find->WATER_VOL)}}</div>        </td>
        <td class="row-border" rowspan="2">
            <div align="center">{{number_format($find->AQUIFER)}}</div>        </td>
        <td class="row-border" rowspan="2" >
            <div align="center">{{number_format($find->WATER_FLAT)}}</div>        </td>
        <td class="row-border" rowspan="2" >
            <div align="center">{{number_format($find->TOTAL_WATER)}}</div>        </td>
        <td class="row-border" rowspan="2" >
            <div align="center">{{number_format($find->METER_INST)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="row-border" colspan="6" bordercolor="#000000" bgcolor="#999999">
            <div align="center"><strong>Other Charges </strong></div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" bgcolor="#999999" class="row-border">
            <div align="center"><strong>Sr # </strong></div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000" bgcolor="#999999">
            <div align="center"><strong>Description</strong></div>        </td>
        <td class="row-border" bordercolor="#000000" bgcolor="#999999">
            <div align="center"><strong>Amount (Rs) </strong></div>        </td>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="3" bgcolor="#bbffe4" class="amount_section">
            <h3><br>Amount (Within Due Date) </h3>        </td>
        <td colspan="1" rowspan="3" bgcolor="#bbffe4" class="amount_section">
            <h3>
                <div align="right"><br>{{number_format($find->AMT_WITHIN_DD)}}</div>
            </h3>        </td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">1</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Arrears of Previous bill </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->ARREAR)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">2</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Spray Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->SPRAY)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">3</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Cost of Garbage Basket </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->GARBAGE_BASKET)}}</div>        </td>
        <td>&nbsp;</td>
        <td colspan="5" rowspan="3" bgcolor="#ffe1fb" class="amount_section">
            <h3><br>Amount (After Due Date) </h3>        </td>
        <td colspan="1" rowspan="3" bgcolor="#ffe1fb" class="amount_section">
            <h3>
                <div align="right"><br>{{number_format($find->AMT_AFTER_DD)}}</div>
            </h3>        </td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">4</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Masjid Maintenance Fund </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->MASJID)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">5</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Cleanliness Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->CLEANLINESS)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">6</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Maintenance Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->MAINT)}}</div>        </td>
        <td>&nbsp;</td>
        <td colspan="6"><strong>Amount in Words PKR: {{ $find->AMT_IN_WORDS }} </strong></td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">7</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Swimming Pool Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{ number_format($find->SWIMMING_POOL)}}</div>        </td>
        <td>&nbsp;</td>
        <td align="center" class="row-border" colspan="8" rowspan="4">';
            @if($find->BILL_NOTICE){
                <img src={{asset('front/dist/img/water_bill/water_bill_notice.jpg')}} alt='disconnection_notice' width='250' />
            @endif        </td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">8</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Violation Charges / Other Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->VIOLATION)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">9</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Garbage Bags Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->GARBAGE_BAGS)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">10</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Conservancy Charges </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->CONSERVANCY)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td bordercolor="#000000" class="row-border">
            <div align="center">11</div>        </td>
        <td class="row-border" colspan="4" bordercolor="#000000">Security Charges</td>
        <td class="row-border" bordercolor="#000000">
            <div align="right">{{number_format($find->SECURTY)}}</div>        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="row-border" colspan="4" bordercolor="#000000">* Online Payment is acceptable against bill Ref No. {{$find->CUST_REF_NO}} through 1-Bill Service. </td>
        <td style="td{vertical-align:middle;}" class="row-border" bordercolor="#000000">
            <div align="center"><strong>Total</strong></div>        </td>
        <td class="row-border" bordercolor="#000000">
            <div align="right"><strong>{{number_format($find->TOTAL_WATER)}}</strong></div>        </td>
        <td>&nbsp;</td>
        <td colspan="8" align="center" class="row-border"><strong>Signature / Bank Stamp </strong></td>
    </tr>
    <br>
    <tr>
        <td colspan="15">
            <hr style="border:1px dashed black">        </td>
    </tr>
    <tr>
      <td colspan="2" rowspan="7">
        <div align="center"><img src={{asset('front/dist/img/water_bill/dha-logo.png')}} height="50" alt="logo"></div>        </td>
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
        <td width="0%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT</strong></h3>
            </div>        </td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>WATER / SEWERAGE BILL </strong></h3>
            </div>        </td>
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
      <td colspan="4"></td>
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
        <td colspan="4"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Bill No.</strong></td>
        <td>{{$find->BILL_NO}}</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="right" style="font-size:8px"><strong>WEB GENERATED BILL</strong></div></td>
    </tr>
    <tr>
        <td colspan="2"=><strong>Ref. No.</strong></td>
        <td colspan="2">{{$find->CUST_REF_NO}}</td>
        <td><strong>Customer ID</strong></td>
        <td>{{$find->CUST_ID}}</td>
        <td colspan="2"><strong>Meter No.</strong></td>
        <td>{{$find->METER_NO}}</td>
        <td colspan="3"><strong>Connection Type:</strong></td>
        <td>{{$find->PLOT_TYPE_DESC}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Plot / House No.</strong></td>
        <td colspan="2">{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Issue Date:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td colspan="3"><strong>Period From:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->FROM_DATE))}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Name:</strong></td>
        <td colspan="2">{{$find->BILL_TITLE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Due Date:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->DUE_DATE))}}</td>
        <td colspan="3"><strong>Period To:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->TO_DAT))}}</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr class="row-border" >
        <td class="row-border" colspan="5" rowspan="3"><strong>Signature / Bank Stamp </strong></td>
        <td class="row-border" colspan="10">
            <div align="center"><strong>Amount (Rs) </strong></div>        </td>
    </tr>
    <tr class="row-border" >
        <td class="row-border" colspan="4">
            <div align="center"><strong>Within Due Date </strong></div>        </td>
        <td class="row-border" colspan="6">
            <div align="center"><strong>After Due Date </strong></div>        </td>
    </tr>
    <tr class="row-border" >
        <td class="row-border" colspan="4">
            <div align="center"><strong>{{number_format($find->AMT_WITHIN_DD)}}</strong></div>        </td>
        <td class="row-border" colspan="6">
            <div align="center"><strong>{{number_format($find->AMT_AFTER_DD)}}</strong></div>        </td>
    </tr>
    <tr>
        <td colspan="15">
            <div align="center"><strong>Note:</strong> Please notify our Front Desk Office in case of errors or question about your bill. </div>        </td>
    </tr>
    <tr>
        <td colspan="15">
            <hr style="border:1px dashed black" />        </td>
    </tr>
    <tr>
      <td colspan="2" rowspan="7">
        <div align="center"><img src={{asset('front/dist/img/water_bill/dha-logo.png')}} height="50" alt="logo"></div>        </td>
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
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>DEFENCE HOUSING AUTHORITY LAHORE CANTT</strong></h3>
            </div>        </td>
    </tr>
    <tr>
        <td colspan="11">
            <div align="center">
                <h3><strong>WATER / SEWERAGE BILL </strong></h3>
            </div>        </td>
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
      <td colspan="4"></td>
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
        <td colspan="4">                    </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Bill No.</strong></td>
        <td>{{$find->BILL_NO}}</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="right" style="font-size:8px"><strong>WEB GENERATED BILL</strong></div></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Ref. No.</strong></td>
        <td colspan="2">{{$find->CUST_REF_NO}}</td>
        <td><strong>Customer ID</strong></td>
        <td>{{$find->CUST_ID}}</td>
        <td colspan="2"><strong>Meter No.</strong></td>
        <td>{{$find->METER_NO}}</td>
        <td colspan="3"><strong>Connection Type:</strong></td>
        <td>{{$find->PLOT_TYPE_DESC}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Plot / House No.</strong></td>
        <td colspan="2">{{$find->PLOT_NO}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Issue Date:</strong></td>
        <td>{{$find->ISSUE_DATE}}</td>
        <td colspan="3"><strong>Period From:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->FROM_DATE))}}</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Name:</strong></td>
        <td colspan="2">{{$find->BILL_TITLE}}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>Due Date:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->DUE_DATE))}}</td>
        <td colspan="3"><strong>Period To:</strong></td>
        <td>{{date("d-M-Y", strtotime($find->TO_DAT))}}</td>
    <tr class="row-border" >
        <td class="row-border" colspan="5" rowspan="3"><strong>Signature / Bank Stamp </strong></td>
        <td class="row-border" colspan="10">
            <div align="center"><strong>Amount (Rs) </strong></div>        </td>
    </tr>
    <tr class="row-border" >
        <td class="row-border" colspan="5">
            <div align="center"><strong>Within Due Date </strong></div>        </td>
        <td class="row-border" colspan="5">
            <div align="center"><strong>After Due Date </strong></div>        </td>
    </tr>
    <tr class="row-border">
        <td class="row-border" colspan="5">
            <div align="center"><strong>{{ number_format($find->AMT_WITHIN_DD)}}</strong></div>        </td>
        <td class="row-border" colspan="5">
            <div align="center"><strong>{{ number_format($find->AMT_AFTER_DD)}}</strong></div>        </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
      <td colspan="5">&nbsp;</td>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
      <td colspan="5">&nbsp;</td>
      <td colspan="5">&nbsp;</td>
    </tr>
</table>
