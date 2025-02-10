@extends('main')
@section('content')

    @php
        if(empty($item)){
            $item = NULL;
        }
        $route = 'export_invoice_list';
        $action = $item?->id > 0 ? route($route.'.update', $item?->id) : '' ;
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom bg-dark-o-20" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Tax Invoice
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0)" id="downloadPdf"
                           class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="fas fa-download download-icon"></i>
                            Download
                        </a>
                    </div>
                </div>
                <div class="card-body bg-white" id="main_content" style="width: 942px; margin:auto">
                    <table width="100%">
                        <tbody>
                        <tr style="height:20px;">
                            <td align="left" valign="top"
                                style=" border:0px solid; border-top: 0px;border-right: none;border-left: none;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr width="100%">
                                        <th style="padding-left:20px;padding-bottom: 1px;text-align: center;font-size: 28px;font-family: verdana"
                                            colspan="3" class="body_text"><b>{{$item->exporter_id}}</b></th>
                                    </tr>
                                    <tr width="100%">
                                        <th style="padding-left:20px;padding-bottom: 1px;font-size: 18px;font-family: verdana"
                                            class="body_text"><b>GST NO - {{$item->transportaion?->gst}}</b></th>

                                        <th style="padding-left:40px;padding-bottom: 1px;font-size: 18px;font-family: verdana"
                                            class="body_text"><b></b></th>
                                    </tr>
                                    <tr width="100%">
                                        <td style="padding-left:20px;padding-bottom: 1px;text-align: center;"
                                            colspan="3" class="body_text">TEXTILE-SEZ, IG3 INFRA LTD,
                                            VADAMUGAM, KANGEYAM PALAYAM,TIRUPUR -638751
                                        </td>

                                    </tr>
                                    <tr width="100%">
                                        <td style="padding-left:20px;padding-bottom: 1px;text-align: center;"
                                            colspan="3" class="body_text">TEL : 0
                                        </td>
                                    </tr>
                                    <tr width="100%">
                                        <td style="padding-left:20px;padding-bottom: 1px;text-align: center;border-bottom: 1px solid;font-size: 18px;font-family: verdana"
                                            colspan="3" class="body_text"><b>COMMERCIAL INVOICE ({{$item->exporter_id}}
                                                )</b></td>
                                    </tr>
                                    <tr width="100%">
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr style="height:20px;">
                            <td align="left" valign="top"
                                style=" border:0px solid; border-top: 0px;border-right: none;border-left: none;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr width="100%">
                                        <td style="padding-right:20px;padding-bottom: 1px;text-align: right;"
                                            class="body_text"><b>INVOICE
                                                NO: </b>{{ $item?->invoice_number ?? $item?->id }}
                                        </td>
                                    </tr>
                                    <tr width="100%">
                                        <td style="padding-right:20px;padding-bottom: 1px;text-align: right;border-bottom: 1px solid;"
                                            class="body_text"><b>ISSUE DATE: </b>{{ $item?->invoice_date }}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>


                        <tr id="trHeight">
                            <td>
                                <table class="tabl" cellpadding="0" cellspacing="0"
                                       style="width: 100%; border: 1px solid black; border-collapse: collapse; border-left: none; border-right:none;border-bottom: none;">
                                    <tbody>
                                    <tr id="trHeight1"
                                        style="border: 1px solid black; border-right:none; border-left:none; border-bottom:none">

                                        <td valign="top">
                                            <table id="invoice-table" height="100%" class="tabl"
                                                   style="table-layout:fixed;width:100%;border-collapse: collapse; border-left: none; border-right:none;border-bottom: none;border-top: none;">
                                                <tbody height="100%">


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel" valign="top"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        BILL TO:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">
                                                        {{ $item?->buyer?->name }}
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        Bank Data:
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;"></th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel" valign="top"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        ADDRESS:
                                                    </th>
                                                    <th class="body_text" valign="top"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">

                                                        {{ $item?->buyer?->address_1 }}


                                                        {{ $item?->buyer?->city?->name }},


                                                        {{ $item?->buyer?->country?->name }}


                                                        <br>
                                                        GSTIN:{{ $item?->buyer?->country?->gst }}
                                                    </th>

                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel" valign="top"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        NAME:
                                                    </th>
                                                    <th class="body_text" valign="top"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">
                                                        {{ $item?->company_bank?->name }}
                                                    </th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        ATTN TO:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        AC/NO:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">

                                                    </th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        TEL:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">
                                                        {{ $item?->buyer?->phone }}
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        IFSC:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">

                                                    </th>

                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        SWIFT CODE:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;"></th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">AD
                                                        CODE:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;"></th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        BRANCH:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;"></th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel" valign="top"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        SHIP TO:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">
                                                        {{ $item?->buyer?->name }},
                                                        {{ $item?->buyer?->country?->name }},,,,
                                                        {{ $item?->buyer?->city?->name }},
                                                        {{ $item?->buyer?->state_code }}
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">
                                                    </th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        ATTN TO:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;"></th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;">
                                                        TEL:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">
                                                        {{ $item?->buyer?->phone }}
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">
                                                    </th>
                                                </tr>


                                                <tr style="border-bottom:0px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:20%;padding: 3px;">
                                                        PAYMENT TERMS:
                                                    </th>
                                                    <th class="body_text"
                                                        style="border-right:0px solid black;width:30%;padding: 3px;">
                                                        {{ $item?->terms_of_delivery_and_payment?->name }}
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:5%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:9%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:12%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:6%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:10%;padding: 3px;"></th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;">
                                                    </th>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>


                        <tr id="trHeight">
                            <td>
                                <table class="tabl" cellpadding="0" cellspacing="0"
                                       style="width: 100%; border: 1px solid black; border-collapse: collapse; border-left: none; border-right:none;border-bottom: none;">
                                    <tbody>
                                    <tr id="trHeight1"
                                        style="border: 1px solid black; border-right:none; border-left:none; border-bottom:none">

                                        <td valign="top">
                                            <table id="invoice-table" height="100%" class="tabl"
                                                   style="table-layout:fixed;width:100%;border-collapse: collapse; border-left: none; border-right:none;border-bottom: none;border-top: none;">
                                                <tbody height="100%">
                                                <tr style="border-bottom:1px solid black;height: 20px !important;">
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:1px solid black;width:10%;padding: 3px;text-align:center; ">
                                                        S.No
                                                    </th>
                                                    <th class="body_text_boldLabel" colspan="3"
                                                        style="border-right:1px solid black;width:40%;padding: 3px;text-align:center;">
                                                        Description of Goods
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:1px solid black;width:7%;padding: 3px;text-align:center;">
                                                        Colour
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:1px solid black;width:16%;padding: 3px;text-align:center;">
                                                        Quantity - (MTR)
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:1px solid black;width:12%;padding: 3px;text-align:center;">
                                                        Price-Ex-Mill (USD/MTR)
                                                    </th>
                                                    <th class="body_text_boldLabel"
                                                        style="border-right:0px solid black;width:15%;padding: 3px;text-align:center;">
                                                        Amount (USD)
                                                    </th>
                                                </tr>
                                                @php($sub_total = '0')
                                                @foreach( $item?->details ?? array() as $index => $row)
                                                    <tr>
                                                        <td class="body_text"
                                                            style="border-bottom: none;border-top:0px;border-left: none;padding: 3px;vertical-align: top;padding-top: 12px !important;">
{{--                                                            {{$index}}--}}
                                                        </td>
                                                        <td colspan="3" class="body_text"
                                                            style="border-top:0px;border-bottom: none; border-left: 1px solid;padding: 3px;vertical-align: top;padding-top: 0px !important;">
                                                            EVEREST SILVER PD-RFD-58" 15/1LINENX15/1LINEN 44X38 PLAIN
                                                        </td>
                                                        <td class="body_text"
                                                            style="border-top:0px;border-bottom: none; border-left: 1px solid;padding: 3px;vertical-align: top;padding-top: 0px !important;">
                                                            -
                                                        </td>
                                                        <td class="body_text"
                                                            style="border-top:0px;border-bottom: none; border-left: 1px solid;padding: 3px;vertical-align: top;padding-top: 0px !important;">
                                                            2,741.10
                                                        </td>
                                                        <td class="body_text"
                                                            style="border-top:0px;border-bottom: none; border-left: 1px solid;padding: 3px;vertical-align: top;padding-top: 0px !important;">
                                                            6.60
                                                        </td>
                                                        <td class="body_text"
                                                            style="border-top:0px;border-bottom: none; border-left: 1px solid;padding: 3px;vertical-align: top;padding-top: 0px !important;">
                                                            18,091.26
                                                            @php($sub_total += $sub_total)
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;"></td>
                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    >ADD :
                                                    </td>
                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:1%;border-right: 0px solid;border-bottom: none;"
                                                    >
                                                        {{ $item?->add ?? '0.00' }}
                                                    </td>
                                                </tr>


                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;"></td>
                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    >LESS :
                                                    </td>
                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:1%;border-right: 0px solid;border-bottom: none;"
                                                    >
                                                        {{ $item?->less ?? '0.00' }}
                                                    </td>
                                                </tr>
                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;"></td>
                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    >SUB TOTAL :
                                                    </td>
                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 0px solid;border-bottom: none;"
                                                    >
                                                        {{ $sub_total ?? '0.00' }}
                                                    </td>
                                                </tr>


                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;"></td>
                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    >Round OFF
                                                    </td>
                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 0px solid;border-bottom: none;"
                                                    >
                                                        0.00
                                                    </td>
                                                </tr>


                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;"></td>

                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    >IGST : %
                                                    </td>

                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 0px solid;border-bottom: none;"
                                                    >{{ $item?->igst_value ?? '0.00' }}%
                                                    </td>
                                                </tr>


                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="4" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 1px solid;border-bottom: none;padding-left: 10px;text-align: center">
                                                        TOTAL
                                                    </td>
                                                    <td colspan="3" class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 1px solid;border-bottom: none;"
                                                    ></td>
                                                    <td class="body_text_bold"
                                                        style="border-left: none;padding: 3px;width:5%;border-right: 0px solid;border-bottom: none;"
                                                    >
                                                        {{ $item?->total_amount ?? '0.00' }}
                                                    </td>
                                                </tr>


                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="8" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 0px solid;border-bottom: none;padding-left: 10px;text-align: left">
                                                        SAY TOTAL IN WORDS:USD {{ $item?->amount_chargable }}
                                                        only
                                                    </td>

                                                </tr>

                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="8" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 0px solid;border-bottom: none;padding-left: 10px;text-align: left">
                                                        WE CERTIFY THAT GOODS ARE FREELY IMPORTABLE/EXPORTABLE AND NOT
                                                        COVERED UNDER THE NEGATIVE LIST AS PER FOREIGN TRADE POLICY
                                                        2015-2020.
                                                    </td>

                                                </tr>
                                                <tr style="border-top:1px solid black;height: 20px !important;">
                                                    <td colspan="8" class="body_text"
                                                        style="border-left: none;padding: 3px;width:60%;border-right: 0px solid;border-bottom: none;padding-left: 10px;text-align: left">
                                                        We hereby certify the above mentioned goods are of Indian
                                                        origin.
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
            {{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>--}}
            {{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>--}}
            <script src="{{asset('assets/js/html2canvas.js')}}"></script>

            <script>
                $(document).ready(function () {
                    $('#downloadPdf').click(function () {

                        html2canvas(document.getElementById('main_content')).then(canvas => {
                            const {jsPDF} = window.jspdf;
                            const imgData = canvas.toDataURL('image/png');
                            const pdf = new jsPDF('p', 'mm', 'a4');
                            const pdfWidth = pdf.internal.pageSize.getWidth();
                            const pdfHeight = pdf.internal.pageSize.getHeight();

                            // Calculate the ratio to fit the image into PDF
                            const imgWidth = 210; // A4 width in mm
                            const imgHeight = canvas.height * imgWidth / canvas.width;
                            const heightOffset = (imgHeight > pdfHeight) ? imgHeight - pdfHeight : 0;

                            pdf.addImage(imgData, 'PNG', 0, -heightOffset, imgWidth, imgHeight);
                            pdf.save('invoice-{{ $item?->invoice_number ?? $item?->id }}.pdf');
                        }).catch(error => {
                            console.error('Error generating PDF:', error);
                        });
                    });
                });
            </script>
    @endpush

