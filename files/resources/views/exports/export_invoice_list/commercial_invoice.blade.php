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
                            Custom Invoice
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
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <td colspan="12">INVOICE</td>
                        </tr>
                        <tr>
                            <td colspan="2">Exporter :</td>
                            <td colspan="4">
                                {{ $item?->exporter_id }} <br>
                            </td>
                            <td colspan="6">
                                Inv. No. &amp; Dt<br>
                                {{ $item?->invoice_number ?? $item?->id }} Dt.{{ $item?->invoice_date }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">PAN NO</td>
                            <td colspan="4">ABACS8833R</td>
                            <td colspan="6">
                                Buyer's Order No. & Date<br>
                                {{ $item?->cloth_challan?->order?->sales_order?->order_no }}  DATE: {{ $item?->cloth_challan?->order?->sales_order?->order_date }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">GST NO:</td>
                            <td colspan="4">{{$item->transportaion?->gst}}</td>
                            <td colspan="6">
                                Other Ref : {{$item->other_reference}}<br>
                                AD Code:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="3">Notify</td>
                            <td colspan="4" rowspan="3">
                                {{ $item?->notify?->name }} <br>
                                {{ $item?->notify?->address }} <br>
                                {{ $item?->notify?->get_city?->name }} <br>

                            </td>
                            <td colspan="6">TO ORDER</td>
                        </tr>
                        <tr>
                            <td colspan="3">Country of Origin</td>
                            <td colspan="3">Country of Final Destination</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{$item->country_of_origin_of_goods}}</td>
                            <td colspan="3">{{$item->destination_country?->name}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Pre-Carriage by</td>
                            <td colspan="3">Place of Receipt by pre-carrier</td>
                            <td colspan="6" rowspan="5">
                                Terms of Delivery and Payment<br>
                                {{$item->terms_of_delivery_and_payment?->name}}<br>
                                L/C No: {{$item->lc_no}}<br>
                                <br>
                                {{$item->pre_carriage_by?->name}} <br>
                                {{$item->place_of_receipt_by_pre_carrier}}<br>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">{{$item->mode_of_shipment}}</td>
                            <td colspan="3">IG3,UTHUKULI</td>
                        </tr>
                        <tr>
                            <td colspan="3">Vessel/Flight No</td>
                            <td colspan="3">Port of Loading</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{$item->vehicle_flight_number}}</td>
                            <td colspan="3">{{$item->port_of_loading?->name}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Port of Discharge<br>
                                {{$item->port_of_discharge?->name}}
                            </td>
                            <td colspan="3">
                                Final Destination<br>
                                {{$item->final_destination?->name}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0">Marks & Nos</td>
                            <td colspan="2" class="border-0">No. & Kind of</td>
                            <td colspan="5" class="border-0">Description of Goods</td>
                            <td colspan="1" class="border-y-0">Quantity</td>
                            <td colspan="1" class="border-y-0">Rate</td>
                            <td colspan="1" class="border-y-0">Amount</td>
                        </tr>
                        @foreach($item?->details ?? array() as $index => $row)
                        <tr>
                            <td colspan="2" class="border-0"></td>
                            <td colspan="2" class="border-0">29 Rolls</td>
                            <td colspan="5" class="border-0">
                                100 PCT ORGANIC LINEN WOVEN FABRICS EVE<br>
                                REST SILVER PD 25 LEA X 25LEA /44*38/58/<br>
                                210 GSM COL : RFD  IMP SL NO : 3 AVABILE<br>
                            </td>
                            <td colspan="1" class="border-y-0">1104,83</td>
                            <td colspan="1" class="border-y-0">16,3747</td>
                            <td colspan="1" class="border-y-0">18091,26</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="border-0">LUT ARN NO : {{$item->lut_value ?? '0'}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0">ADVANCE Licence no : {{$item->licence_number?->number}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0">EPCG Licence no : {{$item->epcg_license_number}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0">CONTAINER NO: {{$item->container_no}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0">Seal No : {{$item->chipper_seal_number}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="border-0"></td>
                            <td colspan="2">INSURANCE :0.0</td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0">SALES CONTRACT NO: {{$item->rfid_seal_number}}</td>
                            <td colspan="5" class="border-0"></td>
                            <td colspan="2">FREIGHT : {{$item->freight}}</td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="border-0 border-bottom-lg"></td>
                            <td colspan="2">COMMISSION :{{$item->commission}}</td>
                            <td colspan="1" class="border-y-0"></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="border-0">Amount Chargable</td>
                            <td colspan="1" rowspan="2">Total</td>
                            <td colspan="1" rowspan="2">{{$item->total_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="border-0">(in words)</td>
                            <td colspan="9" class="border-0">(U.S. Dollars {{$item->amount_chargable}} Only)</td>
                        </tr>
                        <tr>
                            <td colspan="7" class="border-0">Declaration :</td>
                            <td colspan="5" rowspan="5"></td>
                        </tr>
                        <tr>
                            <td colspan="7" class="border-0">We declare that the above goods are of Indian origin.</td>
                        </tr>
                        <tr>
                            <td colspan="7" class="border-0">We declare that this invoice shows the actual price of the goods</td>
                        </tr>

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

