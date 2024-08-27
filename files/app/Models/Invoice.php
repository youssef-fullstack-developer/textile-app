<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'cloth_challan_id',
        'invoice_number',
        'approval',
        'approval_date',
        'internal_remark',
        'customer_instruction',
        'comments',
        'exporter_id',
        'invoice_date',
        'exporter_ref',
        'so_no',
        'reuse_deleted_invoice',
        'lc_no',
        'lc_date',
        'company_bank_id',
        'buyer',
        'buyer_if_other_than_consignee',
        'buyer_id',
        'buyer_description',
        'to_order',
        'Notify_id',
        'challan_number',
        'country_of_origin_of_goods',
        'destination_country_id',
        'pre_carriage_by_id',
        'place_of_receipt_by_pre_carrier',
        'vehicle_flight_number',
        'port_of_loading_id',
        'port_of_loading_details',
        'port_of_discharge_id',
        'final_destination_id',
        'container_no',
        'container_size_id',
        'forwarder_id',
        'line_name_id',
        'agent_id',
        'agent_percent',
        'licence_type',
        'licence_number_id',
        'port_of_discharge',
        'epcg_license_holder',
        'terms_of_delivery_and_payment',
        'chipper_seal_number',
        'vehicle_number',
        'rfid_seal_number',
        'transportation_id',
        'container_type_id',
        'sales_type_id',
        'lr_no',
        'lr_date',
        'add',
        'less',
        'total_tax',
        'total_amount',
        'insurance',
        'freight',
        'commission',
        'inr_value',
        'insurance_hsn',
        'freight_hsn',
        'currency_convertion_value',
        'including_gst_inr_value',
        'bale_role_no_range',
        'igst_lut',
        'lc_bank_id',
        'dbk',
        'ritc',
        'place',
        'documents_delivered',
        'company_logo',

    ];


    public function cloth_challan()
    {
        return $this->belongsTo(ClothChallan::class, 'cloth_challan_id', 'id');
    }

    public function additionals()
    {
        return $this->hasMany(InvoiceAdditional::class, 'invoice_id', 'id');
    }

    public function discounts()
    {
        return $this->hasMany(InvoiceDiscount::class, 'invoice_id', 'id');
    }

    public function others()
    {
        return $this->hasMany(InvoiceOther::class, 'invoice_id', 'id');
    }


}
