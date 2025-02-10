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
        'other_reference',
        'term_of_price_id',
        'mode_of_shipment',
        'buyer',
        'buyer_if_other_than_consignee',
        'buyer_id',
        'buyer_description',
        'to_order',
        'notify_id',
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
        'epcg_license_number',
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
        'igst_value',
        'lut_value',
        'lc_bank_id',
        'dbk',
        'ritc',
        'place',
        'documents_delivered',
        'company_logo',
        'amount_chargable',
    ];


    public function cloth_challan()
    {
        return $this->belongsTo(ClothChallan::class, 'cloth_challan_id', 'id')->with('buyer','transportation','order','sort','consignee','order_sort','packing_type','from_bale','to_bale');
    }
//    public function exporter()
//    {
//        return $this->hasOne(Vendors::class, 'id', 'exporter_id')->with('get_city');
//    }

    public function notify()
    {
        return $this->hasOne(Vendors::class, 'id', 'notify_id')->with('get_city');
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

    public function buyer()
    {
        return $this->hasOne(Buyers::class, 'id', 'buyer_id')->with('country','state','city');
    }

    public function company_bank()
    {
        return $this->hasOne(Bank::class, 'id', 'company_bank_id');
    }
    public function destination_country()
    {
        return $this->hasOne(Countries::class, 'id', 'destination_country_id');
    }
    public function pre_carriage_by()
    {
        return $this->hasOne(PreCarriage::class, 'id', 'pre_carriage_by_id');
    }
    public function port_of_loading()
    {
        return $this->hasOne(Port::class, 'id', 'port_of_loading_id');
    }
    public function port_of_discharge()
    {
        return $this->hasOne(Port::class, 'id', 'port_of_discharge_id');
    }
    public function final_destination()
    {
        return $this->hasOne(Port::class, 'id', 'final_destination_id');
    }
    public function container_size()
    {
        return $this->hasOne(ContainerSize::class, 'id', 'container_size_id');
    }
    public function forwarder()
    {
        return $this->hasOne(Vendors::class, 'id', 'forwarder_id');
    }
    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
    public function transportation()
    {
        return $this->hasOne(Transportations::class, 'id', 'transportation_id');
    }
    public function container_type()
    {
        return $this->hasOne(ContractType::class, 'id', 'container_type_id');
    }
    public function sales_type()
    {
        return $this->hasOne(SalesType::class, 'id', 'sales_type_id');
    }
    public function lc_bank()
    {
        return $this->hasOne(Bank::class, 'id', 'lc_bank_id');
    }
    public function licence_number()
    {
        return $this->hasOne(License::class, 'id', 'licence_number_id');
    }
    public function terms_of_delivery_and_payment()
    {
        return $this->hasOne(PaymentTerms::class, 'id', 'terms_of_delivery_and_payment');
    }
    public function term_of_price()
    {
        return $this->hasOne(PaymentTerms::class, 'id', 'term_of_price_id');
    }


}
