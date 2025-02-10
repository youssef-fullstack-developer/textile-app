<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no'
        ,'invoice_type_id'
        , 'contract_type_id'
        , 'city_id'
        , 'order_route_id'
        , 'order_date'
        , 'po_no'
        , 'po_date'
        , 'buyer_id'
        , 'adress'
        , 'tax_id'
        , 'sourcing_executive_id'
        , 'ship_to_id'
        , 'ship_adress'
        , 'sale_contract_no'
        , 'agent_id'
        , 'agent_percent'
        , 'port_loading'
        , 'port_destination'
        , 'insurance'
        , 'shipping_method'
        , 'shipping_terms_id'
        , 'shipping_terms_det'
        , 'bank_id'
        , 'container_size_id'
        , 'payment_terms_id'
        , 'terms_conditions_id'
        , 'user_id'
        , 'confirmation_date'
        , 'sales_co_ordinator_id'
        , 'so_type_id'
        , 'remark'
        , 'pi_date'

    ];

    public function sales_order_details()
    {
        $relations = (new SalesOrderDetail())->getRelations();
        return $this->hasMany(SalesOrderDetail::class, 'sales_order_id', 'id')->with(array_keys($relations));
    }
    public function buyer()
    {
        $relations = (new Buyers())->getRelations();
        return $this->hasOne(Buyers::class, 'id', 'buyer_id')->with(array_keys($relations));
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function order_route()
    {
        return $this->hasOne(ContractTypeDetail::class, 'id', 'order_route_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

    public function terms_conditions()
    {
        return $this->hasOne(TermsCondition::class, 'id', 'terms_conditions_id');
    }
    public function payment_terms()
    {
        return $this->hasOne(PaymentTerms::class, 'id', 'payment_terms_id');
    }
    public function shipping_terms()
    {
        return $this->hasOne(ShippingTerm::class, 'id', 'shipping_terms_id');
    }
    public function so_type()
    {
        return $this->hasOne(SoType::class, 'id', 'so_type_id');
    }
    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
    public function sourcing_executive()
    {
        return $this->hasOne(BuyerRepresentative::class, 'id', 'sourcing_executive_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function ship_to()
    {
        return $this->hasOne(ShipTo::class, 'id', 'ship_to_id');
    }
    public function contract_type()
    {
        return $this->hasOne(Contracts::class, 'id', 'contract_type_id');
    }
    public function invoice_type()
    {
        return $this->hasOne(InvoiceType::class, 'id', 'invoice_type_id');
    }

    public static function boot()
    {
        parent::boot();

        // Add the deleting event
        static::deleting(function ($current_model) {
            // Check if the related yarn certification exists
//            if ($current_model->yarn_certification_type) {
                $current_model->sales_order_details->delete();
//            }
        });
    }


}
