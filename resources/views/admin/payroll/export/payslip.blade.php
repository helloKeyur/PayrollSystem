<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Payslips {{ $date }} | PeSystem - A System for HR Payment Generator. </title>
    <style type="text/css">
      body {
          position: relative;
          width: auto;  
          height: 29.7cm; 
          color: #001028;
          background: #FFFFFF; 
          font-size: 14px;
          font-family : 'helvetica';
      }
      table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
      }

      table tr:nth-child(2n-1) td {
          background: #F5F5F5;
      }

      table th,
      table td {
          text-align: center;
      }

      table th {
          padding: 5px 20px;
          color: #5D6975;
          border-bottom: 1px solid #C1CED9;
          white-space: nowrap;        
          font-weight: normal;
      }

      table td {
          padding: 10px;
          text-align: left;
      }

      .text-center{
        text-align: center;
      }

      .border-top-bootom-1{
        border-top: 1px solid #C1CED9;
        border-bottom: 1px solid #C1CED9;
      }
      .py-4{
        padding-top:16px;
        padding-bottom:16px;
      }

      .my-4{
        margin-top:16px;
        margin-bottom:16px;
      }

      .px-4{
        padding-left:16px;
        padding-right:16px;
      }

      .mx-4{
        margin-left:16px;
        margin-right:16px;
      }

      .row-inline-block{
        display: inline-block;
      }
      .row > .col-4{
        width: 33%;
        display: inline-block;
      }

      .row > .col-6{
        width: 49%;
        display: inline-block;
      }

      .border-1{
        border:1px solid #C1CED9;
      }

      .text-right{
        text-align: right;
      }

      .block{
        text-align: right;
      }
      .block p{
        width: 50%;
      }

      .column {
        float: left;
        width: 50%;
      }

      /* Clear floats after the columns */
      .row-css:after {
        content: "";
        display: table;
        clear: both;
      }
  </style>
  </head>
  <body>
    <div class="card border-1">
          <div class="card-header">
              <h2 class="text-center border-top-bootom-1 py-4">PESYSTEM - EMPLOYEE PAYMENT SLIPS</h2>
              <h2 class="text-center border-top-bootom-1 py-4">{{ $date }}</h2>
          </div>
          <div class="card-body border">
            
            @foreach($payrolls as $payroll)
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table cellspacing="0" cellpadding="3" class="table">  
                        <tr>  
                            <td width="25%" align="right">Employee Name: </td>
                            <td width="25%"><b>{{ $payroll->first_name." ".$payroll->last_name }}</b></td>
                            <td width="25%" align="right">Rate per Hour: </td>
                            <td width="25%" align="right">{{ $payroll->rate_per_hour }}</td>
                        </tr>
                        <tr>
                            <td width="25%" align="right">Employee ID: </td>
                            <td width="25%">{{ $payroll->employee_id }}</td>   
                            <td width="25%" align="right">Total Hours: </td>
                            <td width="25%" align="right">{{ $payroll->total_working_hour }}</td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right"><b>Gross Pay: </b></td>
                            <td width="25%" align="right"><b>{{ number_format($payroll->gross_amount,2) }}</b></td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right">Deduction: </td>
                            <td width="25%" align="right">{{ number_format($deduction_amount,2) }}</td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right">Cash Advance: </td>
                            <td width="25%" align="right">{{ number_format($payroll->cashAdvances->sum('rate_amount'),2) }}</td> 
                        </tr>
                        <tr> 
                          @php
                          $total_overtime_amount = 0;
                          foreach($payroll->overtimes as $ov){
                            $total_overtime_amount += ($ov->rate_amount * $ov->hour)/60;
                          }
                          @endphp
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right">Overtime: </td>
                            <td width="25%" align="right">{{ number_format($total_overtime_amount,2) }}</td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right"><b>Total Deduction:</b></td>
                            <td width="25%" align="right"><b>
                                {{ number_format($deduction_amount + $payroll->cashAdvances->sum('rate_amount'),2) }}
                            </b></td> 
                        </tr>
                        <tr> 
                            <td></td> 
                            <td></td>
                            <td width="25%" align="right"><b>Net Pay:</b></td>
                            <td width="25%" align="right"><b>
                                {{ number_format(($payroll->gross_amount + $total_overtime_amount) - ($deduction_amount + $payroll->cashAdvances->sum('rate_amount')),2) }}
                            </b></td> 
                        </tr>
                    </table><hr>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
  </body>
</html>
