<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Payroll {{ $date }} | PeSystem - A System for HR Payment Generator. </title>
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
          border: 1px solid #dee2e6;
          border-collapse: collapse;
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
          padding: 12px;
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
              <h2 class="text-center border-top-bootom-1 py-4">PESYSTEM - PAYROLLS</h2>
              <h2 class="text-center border-top-bootom-1 py-4">{{ $date }}</h2>
          </div>
          <div class="card-body border">
            
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="border table table-bordered" cellspacing="0" cellpadding="3">  
                     <tr>  
                      <th width="40%" class="text-left"><b>Employee Name</b></th>
                      <th width="30%" align="center"><b>Employee ID</b></th>
                      <th width="30%" class="text-left"><b>Net Pay</b></th> 
                    </tr> 
                    @php
                      $total = 0; 
                    @endphp
                    @foreach($payrolls as $payroll) 
                    <tr>
                      @php
                        $total_overtime_amount = 0;
                        foreach($payroll->overtimes as $ov){
                            $total_overtime_amount += ($ov->rate_amount * $ov->hour)/60;
                        }
                        $net_pay = ($payroll->gross_amount + $total_overtime_amount) - ($deduction_amount + $payroll->cashAdvances->sum('rate_amount')); 
                        $total += $net_pay;
                      @endphp

                      <td>{{ $payroll->first_name." ".$payroll->last_name }}</td>
                      <td>{{ $payroll->employee_id }}</td>
                      <td align="right" class="text-right">{{ number_format($net_pay,2) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="2" class="text-right"><b>Total</b></td>
                      <td class="text-right"><b>RS. {{ number_format($total,2) }}</b></td>
                    </tr>
                  </div>
                </div>
          </div>
        </div>
  </body>
</html>
