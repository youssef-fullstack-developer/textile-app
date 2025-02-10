<?php

namespace Database\Seeders;

use App\Models\PermissionsFam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        db::table("permissions_fams")->truncate();
        Role::updateOrCreate(['name' => 'super-admin']);


        // Begin permissions
//        $lang = array(
//            "show" => __("View"),
//            "create" => __("Add"),
//            "update" => __("Update"),
//            "delete" => __("Delete"),
//            "permissions" => __("Permissions"),
//            "dashboard" => __("Dashboard"),
//            "masters" => __("Masters"),
//            "export" => __("Export"),
//            "approvals" => __("Approvals"),
//            "yarn_master" => __("Yarn Master"),
//            "stock" => __("Stock"),
//            "purchase" => __("Purchase"),
//            "sort_master" => __("Sort Master"),
//            "planning" => __("Planning"),
//            "warehouse" => __("Warehouse"),
//            "others" => __("Others"),
//        );


        $permissions = array(
//            Masters                ****************************************************************************
            ['familly' => 'Masters', 'name' => 'e_invoice_settings', 'libelle' => __('E - Invoice Settings'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'certification_type', 'libelle' => __('Certification Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'consignee', 'libelle' => __('Consignee'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'shade_master', 'libelle' => __('Shade Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'vendor', 'libelle' => __('Vendor'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'group_type', 'libelle' => __('Group Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'vendor_group', 'libelle' => __('Vendor Group'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'godown_location', 'libelle' => __('Godown Location'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'sales_master_type', 'libelle' => __('Sales Master Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'gst', 'libelle' => __('GST'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'color', 'libelle' => __('Color'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'copart', 'libelle' => __('Copart'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'contract_type', 'libelle' => __('Contract Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'agents', 'libelle' => __('Agents'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'transportation', 'libelle' => __('Transportation'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'loom_type', 'libelle' => __('Loom Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'delivery_items', 'libelle' => __('Delivery Items'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'inspection_type', 'libelle' => __('Inspection Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'packing_type', 'libelle' => __('Packing Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'mill_master', 'libelle' => __('Mill Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'country', 'libelle' => __('Country'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'payment_types', 'libelle' => __('Payment types'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'payment_terms', 'libelle' => __('Payment Terms'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'gst_registered_type', 'libelle' => __('GST Registered Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'account_group', 'libelle' => __('Account Group'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Masters', 'name' => 'machine', 'libelle' => __('Machine'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Export                ****************************************************************************
            ['familly' => 'Export', 'name' => 'buyer', 'libelle' => __('Buyer'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'sales_order', 'libelle' => __('Sales Order'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'packing_list', 'libelle' => __('Packing List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'export_invoice_list', 'libelle' => __('Export Invoice List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'licence', 'libelle' => __('Licence'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'pre_carriage_by', 'libelle' => __('Pre-Carriage By'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'port', 'libelle' => __('Port'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'port_of_destination', 'libelle' => __('Port Of Destination'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'bank', 'libelle' => __('Bank'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'container_size', 'libelle' => __('Container Size'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'sales_co_ordinators', 'libelle' => __('Sales Co Ordinators'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'shipping_terms', 'libelle' => __('Shipping Terms'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'ship_to', 'libelle' => __('Ship To'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'so_types', 'libelle' => __('So Types'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'terms_&_conditions', 'libelle' => __('Terms & Conditions'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'units', 'libelle' => __('Units'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Export', 'name' => 'yarn_certification_types', 'libelle' => __('Yarn Certification Types'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Approvals             ****************************************************************************
            ['familly' => 'Approvals', 'name' => 'export_so', 'libelle' => __('Export SO'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Approvals', 'name' => 'po_fabric_processing_jw', 'libelle' => __('PO-Fabric Processing JW'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Approvals', 'name' => 'po_fabric_purchase', 'libelle' => __('PO-Fabric Purchase'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Approvals', 'name' => 'po_yarn', 'libelle' => __('PO Yarn'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Approvals', 'name' => 'invoice', 'libelle' => __('Invoice'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Yarn Master               ****************************************************************************
            ['familly' => 'Yarn_Master', 'name' => 'count', 'libelle' => __('Count'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'ply', 'libelle' => __('Ply'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'uom', 'libelle' => __('Uom'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'mill_master', 'libelle' => __('Mill Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'yarn_variety', 'libelle' => __('Yarn Variety'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'yarn_type', 'libelle' => __('Yarn Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'filaments', 'libelle' => __('Filaments'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'tpm', 'libelle' => __('TPM'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'blends', 'libelle' => __('Blends'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Yarn_Master', 'name' => 'yarn_master', 'libelle' => __('Yarn Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Stock             ****************************************************************************
            ['familly' => 'Stock', 'name' => 'yarn_inward', 'libelle' => __('Yarn Inward'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Stock', 'name' => 'fabric_inward', 'libelle' => __('Fabric Inward'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Stock', 'name' => 'yarn_opening_balance', 'libelle' => __('Yarn Opening Balance'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Stock', 'name' => 'fabric_opening_balance', 'libelle' => __('Fabric Opening Balance'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Purchase              ****************************************************************************
            ['familly' => 'Purchase', 'name' => 'yarn_po', 'libelle' => __('Yarn PO'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Purchase', 'name' => 'fabric_po', 'libelle' => __('Fabric PO'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Purchase', 'name' => 'csp_list', 'libelle' => __('CSP List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Purchase', 'name' => 'hairiness', 'libelle' => __('Hairiness'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Purchase', 'name' => 'count_cv', 'libelle' => __('Count CV'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Purchase', 'name' => 'strength_cv', 'libelle' => __('Strength CV'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Sort Master               ****************************************************************************
            ['familly' => 'Sort_Master', 'name' => 'loom_type', 'libelle' => __('Loom Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Sort_Master', 'name' => 'selvedge_master', 'libelle' => __('Selvedge Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Sort_Master', 'name' => 'weave', 'libelle' => __('Weave'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Sort_Master', 'name' => 'paper_tube_size', 'libelle' => __('Paper Tube Size'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Sort_Master', 'name' => 'sort_master', 'libelle' => __('Sort Master'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Sort_Master', 'name' => 'set_list', 'libelle' => __('Set List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Planning              ****************************************************************************
            ['familly' => 'Planning', 'name' => 'orders_list', 'libelle' => __('Orders List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'jobwork_weaving_contract', 'libelle' => __('Jobwork Weaving Contract'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'jobwork_weaving_weft_issue', 'libelle' => __('Jobwork Weaving Weft Issue'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'jobwork_process_contract', 'libelle' => __('JobWork Process Contract'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'jobwork_process_contract_issue', 'libelle' => __('JobWork Process Contract Issue'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'jobwork_finished_fabric_receive', 'libelle' => __('JobWork Finished Fabric Receive'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'sizing_plan', 'libelle' => __('Sizing Plan'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'sizing_yarn_issue', 'libelle' => __('Sizing Yarn Issue'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'beam_inward', 'libelle' => __('Beam Inward'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Planning', 'name' => 'beam_outward', 'libelle' => __('Beam Outward'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Warehouse             ****************************************************************************
            ['familly' => 'Warehouse', 'name' => 'packing_type', 'libelle' => __('Packing Type'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Warehouse', 'name' => 'jobwork_fabric_receive', 'libelle' => __('Jobwork Fabric Receive'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Warehouse', 'name' => 'bale_packing', 'libelle' => __('Bale Packing'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Warehouse', 'name' => 'cloth_challan', 'libelle' => __('Cloth Challan'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            //            Others                ****************************************************************************
            ['familly' => 'Others', 'name' => 'inspection_list', 'libelle' => __('Inspection List'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'delivery_terms', 'libelle' => __('Delivery Terms'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'country', 'libelle' => __('Country'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'city', 'libelle' => __('City'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'state', 'libelle' => __('State'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'party_to_location', 'libelle' => __('Party to Location'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'roll_/_bale_print_page', 'libelle' => __('Roll / Bale Print Page'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'agents', 'libelle' => __('Agents'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'customer', 'libelle' => __('Customer'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'sourcing_executives', 'libelle' => __('Sourcing Executives'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'weave_factors', 'libelle' => __('Weave Factors'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
            ['familly' => 'Others', 'name' => 'costing', 'libelle' => __('Costing'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],
//            Users             ****************************************************************************
            ['familly' => 'Users', 'name' => 'user', 'libelle' => __('User'), 'actions' => ['view' => true, 'create' => true, 'update' => true, 'delete' => true]],








        );
        $nmbr = 0;
        foreach ($permissions as $key => $line) {
            $fam_id = PermissionsFam::firstOrCreate(
                ['libelle' => $line["familly"]], // Condition to check if the familly exists
                [
                    'name' =>  $line["familly"],
                    'libelle' =>  $line["familly"],
                    'ordre' => ($key + $nmbr),
                ]// Attributes to set if the familly doesn't exist
            );
            if ($fam_id) {
                foreach ($line["actions"] as $name => $val) {
                    if ($val) {
                        Permission::updateOrCreate(
                            ['name' => $line["name"] . '-' . $name],
                            [
                                'libelle' => $line["libelle"],
                                'perm_fam_id' => $fam_id->id
                            ]);
                    }
                }
            }
            // End permissions

        }
    }
}
