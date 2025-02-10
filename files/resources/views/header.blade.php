<!--begin::Header-->

<div id="kt_header" class="header header-fixed ">
    <!--begin::Container-->
    <div class="container-fluid  d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="/dashboard">
                    {{-- <img alt="Logo" src="{{ url('assets/images/', $settings->site_logo) }}" width="128" /> --}}
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <!--begin::Header Nav-->
                <ul class="menu-nav">
                    <li class="menu-item" aria-haspopup="true"><a href="/dashboard" class="menu-link "><span
                                class="menu-text">Dashboard</span></a></li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                class="menu-text">Masters</span><span class="menu-desc"></span><i
                                class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="width: 1000px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('e_invoice_settings-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('invoice_settings.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">E - Invoice Settings</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('certification_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('certification.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Certification Type</span></a>
                                                </li>
                                            @endcan
                                            @can('consignee-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('consignee.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Consignee</span></a>
                                                </li>
                                            @endcan
                                            @can('shade_master-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('shades.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Shade Master</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('vendor-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('vendors.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Vendor</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('group_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('group_type.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Group Type</span></a>
                                                </li>
                                            @endcan
                                            @can('vendor_group-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('vendor_groups.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Vendor Group</span></a>
                                                </li>
                                            @endcan
                                            @can('godown_location-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('godown.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Godown Location</span></a>
                                                </li>
                                            @endcan
                                            @can('sales_master_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('sales_type.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sales Master Type</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('gst-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('gst.index') }}" class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">GST</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('color-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('colors.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Color</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('copart-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('copart.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Copart</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('contract_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('contract_type.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Contract Type</span></a>
                                                </li>
                                            @endcan
                                            @can('agents-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('agents.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Agents</span></a>
                                                </li>
                                            @endcan
                                            @can('transportation-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('transportation.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Transportation</span></a>
                                                </li>
                                            @endcan
                                            @can('loom_type-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('loom_types.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Loom Type</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('delivery_items-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('delivery_item.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Delivery Items</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('inspection_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('inspection.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Inspection Type</span></a>
                                                </li>
                                            @endcan
                                            @can('packing_type-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('packing_types.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Packing Type</span></a>
                                                </li>
                                            @endcan
                                            @can('mill_master-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('mill.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Mill Master</span></a>
                                                </li>
                                            @endcan
                                            @can('country-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('countries.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Country</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('payment_types-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('payment_type.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Payment types</span></a>
                                                </li>
                                            @endcan
                                            @can('payment_terms-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('payment_term.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Payment Terms</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('gst_registered_type-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('gst_registered_type.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">GST Registered Type</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('account_group-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('account_group.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Account Group</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('machine-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('machines.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Machine</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Export</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left" style="width: 400px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('buyer-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('buyers.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Buyer</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('sales_order-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('sales_order.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sales Order</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('packing_list-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('packing_list.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Packing List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('export_invoice_list-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('export_invoice_list.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Export Invoice List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('licence-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('licence.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Licence</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('pre_carriage_by-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('pre_carriage.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Pre-Carriage By</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('port-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('port.index') }}" class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Port</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('port_of_destination-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('port_of_destination.index') }}"
                                                       class="menu-link ">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Port Of Destination</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('bank-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('banks.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Bank</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('container_size-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('container_sizes.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Container Size</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('sales_co_ordinators-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('sales_co_ordinators.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sales Co Ordinators</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('shipping_terms-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('shipping_terms.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Shipping Terms</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('ship_to-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('ship_to.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Ship To</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('so_types-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('so_types.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">So Types</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('terms_&_conditions-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('terms_conditions.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Terms & Conditions</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('units-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('units.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Units</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('yarn_certification_types-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('yarn_certification_types.index') }}"
                                                       class="menu-link bg-warningggg bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Yarn Certification Types</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Approvals</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                @can('export_so-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('export_so') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Export SO</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('po_fabric_purchase-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('approval_po_fabric_purchase') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">PO-Fabric Purchase</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('po_fabric_processing_jw-view')
                                    <li class="menu-item " aria-haspopup="true">
                                        <a href="{{route('po_fabric_processing_jw.index')}}"
                                           class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">PO-Fabric Processing JW</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('po_yarn-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('approval_yarn_po') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">PO Yarn</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('invoice-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('approval_invoice.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Invoice</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Yarn Master</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                @can('count-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('count.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Count</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('ply-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('ply.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Ply</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('uom-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('uom.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Uom</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('mill_master-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('mill.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Mill Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('yarn_variety-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('variety.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Yarn Variety</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('yarn_type-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('yarn_type.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Yarn Type</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('filaments-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('filaments.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Filaments</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('tpm-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('tpms.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">TPM</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('blends-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('blends.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Blends</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('yarn_master-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('yarn.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Yarn Master</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Stock</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                @can('yarn_inward-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('yarn_inward.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Yarn Inward</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('fabric_inward-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('fabric_inward.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Fabric Inward</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('yarn_opening_balance-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('yarn_opening_balance.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Yarn Opening Balance</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('fabric_opening_balance-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('fabric_opening_balance.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Fabric Opening Balance</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Purchase</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-fixed menu-submenu-right" style="width: 350px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('yarn_po-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('yarn_po.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Yarn PO</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('fabric_po-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('fabric_po.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Fabric PO</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('csp_list-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('csp.index') }}" class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">CSP List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('hairiness-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('hairiness.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Hairiness</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('count_cv-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('count_cv.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Count CV</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('strength_cv-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('strength_cv.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Strength CV</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Sort Master</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                @can('loom_type-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('loom_types.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Loom Type</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('selvedge_master-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('selvedge.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Selvedge Master</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('weave-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('weave.index') }}" class="menu-link bg-warningggg ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Weave</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('paper_tube_size-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('paper_tube_sizes.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Paper Tube Size</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('sort_master-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{ route('sort.index') }}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Sort Master</span>
                                        </a>
                                    </li>
                                @endcan
                                {{--                                @can('set_list-view')--}}
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{ route('set_list.index') }}" class="menu-link bg-warningggg">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                            class="menu-text">Set List</span>
                                    </a>
                                </li>
                                {{--                                @endcan--}}
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                class="menu-text">Planning</span><span class="menu-desc"></span><i
                                class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-fixed menu-submenu-right" style="width: 500px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('orders_list-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('get_orders_list') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Orders List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('jobwork_weaving_contract-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('jobwork_weaving_contract.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Jobwork Weaving Contract</span></a>
                                                </li>
                                            @endcan
                                            @can('jobwork_weaving_weft_issue-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('jobwork_weaving_weft_issue.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Jobwork Weaving Weft Issue</span></a>
                                                </li>
                                            @endcan
                                            @can('jobwork_process_contract-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('jobwork_process_contract.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">JobWork Process Contract</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('jobwork_process_contract_issue-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('jobwork_process_contract_issue.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">JobWork Process Contract Issue</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('jobwork_finished_fabric_receive-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('jobwork_finished_fabric_receive.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">JobWork Finished Fabric Receive</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('sizing_plan-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('sizing_plan.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sizing Plan</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('sizing_yarn_issue-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('sizing_yarn_issue.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sizing Yarn Issue</span></a>
                                                </li>
                                            @endcan
                                            @can('beam_inward-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('beam_inward.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Beam Inward</span></a>
                                                </li>
                                            @endcan
                                            @can('beam_outward-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('beam_outward.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Beam Outward</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Warehouse</span><span class="menu-desc"></span>
                            <i class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                @can('packing_type-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{route('packing_types.index')}}" class="menu-link ">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Packing Type</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('jobwork_fabric_receive-view')
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{route('jobwork_fabric_receive.index')}}"
                                           class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Jobwork Fabric Receive</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('bale_packing-view')
                                    <li class="menu-item " aria-haspopup="true">
                                        <a href="{{route('bale_packing.index')}}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Bale Packing</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('cloth_challan-view')
                                    <li class="menu-item " aria-haspopup="true">
                                        <a href="{{route('cloth_challan.index')}}" class="menu-link bg-warningggg">
                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                class="menu-text">Cloth Challan</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    {{-- Others--}}
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                class="menu-text">Others</span><span class="menu-desc"></span><i
                                class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-fixed menu-submenu-right" style="width: 500px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('inspection_list-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('inspection_list.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Inspection List</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('delivery_terms-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{route('delivery_terms.index')}}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Delivery Terms</span></a>
                                                </li>
                                            @endcan
                                            @can('country-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('countries.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Country</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('city-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('cities.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">City</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('state-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('states.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">State</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('party_to_location-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('party_to_location.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Party to Location</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('roll_-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('roll_bale_print_page.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Roll / Bale Print Page</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            @can('agents-view')
                                                <li class="menu-item " aria-haspopup="true">
                                                    <a href="{{ route('agents.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Agents</span></a>
                                                </li>
                                            @endcan
                                            @can('customer-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('customers.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Customer</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('sourcing_executives-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('sourcing_executives.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Sourcing Executives</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('weave_factors-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('weave_factors.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Weave Factors</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('costing-view')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('costings.index') }}"
                                                       class="menu-link bg-warningggg">
                                                        <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                            class="menu-text">Costing</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    {{-- Users--}}
                    @can('user-view')
                        <li class="menu-item  menu-item-submenu menu-item-rel">
                            <a href="{{route('user.index')}}" class="menu-link"><span
                                    class="menu-text">Users</span><span class="menu-desc"></span><i
                                    class="menu-arrow"></i></a>
                        </li>
                @endcan
                <!--
                    <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                        aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                class="menu-text">Reports</span><span class="menu-desc"></span><i
                                class="menu-arrow"></i></a>
                        <div class="menu-submenu menu-submenu-fixed menu-submenu-right" style="width: 1325px">
                            <div class="menu-subnav">
                                <ul class="menu-content">
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('warehouse_stock') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Warehouse Stock</span>
                                                </a>
                                            </li>
                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="#" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric</span></a>
                                            </li>
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('waiting_for_packing') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Waiting for Packing</span></a>
                                            </li> --}}
                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('beam_inward') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Beam Inward</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('beam_inward_against_job_contract') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Beam Inward against Job Contract</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('vendors.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Focused Benefit</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('export_outstanding') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Outstanding</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('export_outstanding_new') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Outstanding New</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('weft_req_report') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Weft Requirement</span></a>
                                            </li>
                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('godown.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Bottom Receive</span></a>
                                            </li>
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('sales_type.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn from Weave Register</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('piece_bale_stock') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Piece & Bale Stock</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('piece_join') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Piece Join</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('weft_issue_report') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Weft Issue</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('yarn_to_sizing_register') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn to Sizing Register</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('stock_inward_yarn') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Stock Inward Yarn</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('opening_closing_balance') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn Opening & Closing Balance</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('sizing_reconciliation') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Sizing Reconcilation</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('inventory_fabric') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Inventory Fabric</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Quality wise Inventory Fabric</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Rewinding Issue</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Rewinding Receive</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Rewinding Receive Pending</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Rewinding Production</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Rewinding Issue to Trading</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('stock_inward_yarn_graph') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Stock Inward Yarn Graph</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Quality wise Jobwork Contract</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('quality_fabric_outward') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Quality wise Fabric Outward</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric Outward</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('location_wise_yarn_stock') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Location wise Yarn Stock</span>
                                                </a>
                                            </li>
                                            {{--
                                                                                        <li class="menu-item " aria-haspopup="true">
                                                                                            <a href="{{ route('gst.index') }}" class="menu-link ">
                                                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                                                    class="menu-text">Contract Completeds</span>
                                                                                            </a>
                                                                                        </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Approval Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('domestic_order_status') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Domestic Order Status (Greige)</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('export_sales_order_status') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Order Status (Greige)</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('domestic_order_status_finished') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Domestic Order Status (Finished)</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('export_sales_order_status_finished') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Order Status (Finished)</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('fabric_po_status_purchase') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric PO Status (Purchase)</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('fabric_po_status_jobwork') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric PO Status (Jobwork)</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('jobwork_fabric_inward') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Jobwork Fabric Inward</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('purchase_fabric_inward') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Purchase Fabric Inward</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('packed_fabric_pending_for_dispatch') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Packing ready for Dispatch</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('fabric_obcb') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric OBCB</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Daily sizing set Issue</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Quality wise sizing set Issue</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('yarn_entry_in_out') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Count entry wise in - out</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('so_status') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">SO Status</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">SO OS</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('yarn_po_status') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn PO Status</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn Stock</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Piecewise Dispatch Details</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Piecewise Available Details</span>
                                                </a>
                                            </li>
                                            {{--
                                                                                        <li class="menu-item " aria-haspopup="true">
                                                                                            <a href="{{ route('gst.index') }}" class="menu-link ">
                                                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                                                    class="menu-text">Container Close</span>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li class="menu-item " aria-haspopup="true">
                                                                                            <a href="{{ route('gst.index') }}" class="menu-link ">
                                                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                                                    class="menu-text">Weaving Reconcilation Summary</span>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li class="menu-item " aria-haspopup="true">
                                                                                            <a href="{{ route('gst.index') }}" class="menu-link ">
                                                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                                                    class="menu-text">Weaving Reconcilation</span>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li class="menu-item " aria-haspopup="true">
                                                                                            <a href="{{ route('gst.index') }}" class="menu-link ">
                                                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                                                    class="menu-text">Rewinding In Out</span>
                                                                                            </a>
                                                                                        </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Fabric In Out</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Invoice</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Domestic Invoice</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('yarn_invoice_report') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn Invoice</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <ul class="menu-inner">
                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Job Contract Status</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Sizing Reconcilation</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn Sales Return</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Sales Return</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Export Details</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Sizing Pending Set</span>
                                                </a>
                                            </li> --}}

                    <li class="menu-item " aria-haspopup="true">
                        <a href="{{ route('location_wise_yarn_stock') }}"
                                                   class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Location wise Yarn Stock</span>
                                                </a>
                                            </li>

                                            {{-- <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">PD</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yearly Sales Summary</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Yarn SO Status</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Graphical Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="menu-item " aria-haspopup="true">
                                                <a href="{{ route('gst.index') }}" class="menu-link ">
                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                        class="menu-text">Beam Outward</span>
                                                </a>
                                            </li>
                                        </ul> --}}
                    </li>

{{-- <li class="menu-item">
                                                <ul class="menu-inner">
                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Weaving Charges Trend</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Yarn Price Trend</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Sales Growth</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Domestic Sales Goal</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Sale & Purchase</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Piece History</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Roll Length</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Order Status</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Rejected Fabric Detail</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Weaving Reconcilation</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " aria-haspopup="true">
                                                        <a href="{{ route('gst.index') }}" class="menu-link ">
                                                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                                class="menu-text">Jobwork Process</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li> --}}
                    </ul>
            </div>
            </div>
            </li>
-->
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2"
                     id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                        {{-- {{ ucfirst(auth()->user()->name) }} --}}
                    </span>
                    <span class="symbol symbol-35 symbol-light-warningggg">
                        <span class="symbol-label font-size-h5 font-weight-bold">
                            {{-- {{ ucfirst(mb_substr(auth()->user()->name, 0, 1)) }} --}}
                        </span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
