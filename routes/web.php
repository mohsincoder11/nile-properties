<?php

use App\Http\Controllers\panel\AccountController;
use App\Http\Controllers\panel\agentRegMasterController;
use App\Http\Controllers\panel\AgreementMasterController;
use App\Http\Controllers\panel\branchMasterController;
use App\Http\Controllers\panel\CommissionPlanController;
use App\Http\Controllers\panel\customerRegMasterController;
use App\Http\Controllers\panel\CustomeStagesController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\empRegMasterController;
use App\Http\Controllers\panel\EnquiryController;
// use App\Http\Controllers\panel\EnquiryController;
use App\Http\Controllers\panel\FirmController;
use App\Http\Controllers\panel\FollowUpController;
use App\Http\Controllers\panel\FollowupLeads;
use App\Http\Controllers\panel\InitiatesellController;
// WEBSITE
use App\Http\Controllers\panel\LandownerController;
use App\Http\Controllers\panel\LeadassignToEmployeeController;
use App\Http\Controllers\panel\MasterController;
use App\Http\Controllers\panel\MyDownline;
use App\Http\Controllers\panel\PaymentCollectionController;
use App\Http\Controllers\panel\PlotTransfercontroller;
use App\Http\Controllers\panel\ReportsController;
use App\Http\Controllers\panel\UserModelController;
use App\Http\Controllers\ProjectEntryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\website\EnquiryFormController;
use App\Http\Controllers\website\IndexController;
use App\Http\Controllers\website\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// website routes

//Register
Route::post('store-registration', [RegistrationController::class, 'storeRegistration'])->name('storeRegistration');
Route::post('/login', [RegistrationController::class, 'login'])->name('login');
//to send otp for forget password
Route::post('send-mobile-verify-otp', [RegistrationController::class, 'send_mobile_verify_otp'])->name('send_otp');

Route::post('/check_mobile_existence', [RegistrationController::class, 'checkMobileExistence'])->name('check_mobile_existence');

//to varify otp
Route::post('verify_otp', [RegistrationController::class, 'verify_otp'])->name('verify_otp');
//update password
Route::post('/update-password', [RegistrationController::class, 'update_password'])->name('update_password');
// Route::post('/logout', [RegistrationController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/logout', [RegistrationController::class, 'logout'])->name('logout');

Route::post('enquiry-form/{id}', [EnquiryFormController::class, 'enquiry_form'])->name('enquiry-form');
//index
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('listing-details/{id}', [IndexController::class, 'listing_details'])->name('listing-details');
Route::get('show-features/{projectId}', [IndexController::class, 'showFeatures'])->name('show-features');
Route::post('store-review', [IndexController::class, 'storeReview'])->name('storeReview');

Route::post('/fetchPlotDetailing', [IndexController::class, 'fetchPlotDetailing'])->name('fetchPlotDetailing');

// web.php
Route::get('/download-map/{id}', [IndexController::class, 'downloadMap'])->name('download.map');
Route::get('/download-brochure/{id}', [IndexController::class, 'downloadBrochure'])->name('download.brochure');
Route::get('/open-youtube/{id}', [IndexController::class, 'openYoutube'])->name('open.youtube');
//Section A
//demo common for logs users
// Route::get('/test-logger', function () {
//     $logger = app('UserActionLogger');
//     $logger->logAction('test_action', 1, 'TestEntity', 'Testing logging');
//     return 'Logged';
// });

// Route::get('/login', [MasterController::class, 'login_index'])->name('login_index');
Route::get('/', [MasterController::class, 'login_index_get'])->name('login_index_get');
Route::get('/login', function () {
    return view('panel.login_index'); // Your login view
})->name('login');

Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

// DASHBOARD
Route::post('/user_check', [DashboardController::class, 'userCheck'])->name('user_check');
// Enquiry Form
Route::post('enquiry-form/{id}', [EnquiryFormController::class, 'enquiry_form'])->name('enquiry-form');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Your dashboard view
    })->name('dashboard');

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('destroy-dash/{id}', [DashboardController::class, 'destroyDash'])->name('destroy-dash');
    Route::get('/home', [DashboardController::class, 'home'])->name('home');

    // MASTER

    //CITY / OCCUPATION / ----

    Route::get('/city_master', [MasterController::class, 'index'])->name('city_master');
    //city
    Route::post('city_store', [MasterController::class, 'city_store'])->name('city_store');
    Route::post('other_charges_store', [MasterController::class, 'other_charges_store'])->name('other_charges_store');

    Route::post('token_store', [MasterController::class, 'token_store'])->name('token_store');

    Route::get('token_destroy/{id}', [MasterController::class, 'token_destroy'])->name('token_destroy');
    Route::get('city_destroy/{id}', [MasterController::class, 'city_destroy'])->name('city_destroy');
    Route::get('other_charges_destroy/{id}', [MasterController::class, 'other_charges_destroy'])->name('other_charges_destroy');

    // Add this route to get city details by ID
    Route::get('/edit_city/{id}', [MasterController::class, 'edit_city']);
    Route::get('/edit_other_charges/{id}', [MasterController::class, 'edit_other_charges']);
    Route::post('/update_city', [MasterController::class, 'update_city'])->name('update_city');
    Route::post('/update_other_charges', [MasterController::class, 'update_other_charges'])->name('update_other_charges');

    Route::get('/edit_token/{id}', [MasterController::class, 'edit_token']);
    Route::post('/update_token', [MasterController::class, 'update_token'])->name('update_token');

    //occupation
    Route::post('occupation_store', [MasterController::class, 'occupation_store'])->name('occupation_store');
    Route::get('occupation_destroy/{id}', [MasterController::class, 'occupation_destroy'])->name('occupation_destroy');
    Route::get('/edit_occupation/{id}', [MasterController::class, 'edit_occupation']);
    Route::post('/update_occupation', [MasterController::class, 'update_occupation'])->name('update_occupation');

    //layout
    Route::post('layout_feature_store', [MasterController::class, 'layout_feature_store'])->name('layout_feature_store');
    Route::get('layout_destroy/{id}', [MasterController::class, 'layout_destroy'])->name('layout_destroy');
    Route::get('/edit_layout/{id}', [MasterController::class, 'edit_layout']);
    Route::post('/update_layout', [MasterController::class, 'update_layout'])->name('update_layout');

    //plot
    Route::post('plot_sale_status_store', [MasterController::class, 'plot_sale_status_store'])->name('plot_sale_status_store');
    Route::get('plot_destroy/{id}', [MasterController::class, 'plot_destroy'])->name('plot_destroy');
    Route::get('/edit_plot/{id}', [MasterController::class, 'edit_plot']);
    Route::post('/update_plot', [MasterController::class, 'update_plot'])->name('update_plot');

    //transaction
    Route::post('transaction_type_store', [MasterController::class, 'transaction_type_store'])->name('transaction_type_store');
    Route::get('transaction_destroy/{id}', [MasterController::class, 'transaction_destroy'])->name('transaction_destroy');
    Route::get('/edit_transaction/{id}', [MasterController::class, 'edit_transaction']);
    Route::post('/update_transaction', [MasterController::class, 'update_transaction'])->name('update_transaction');

    // CITY OCCUPATION ETC END

    // MASTER BRANCH
    Route::get('branch', [branchMasterController::class, 'index'])->name('branch');
    Route::post('branch_store', [branchMasterController::class, 'store'])->name('branchStore');
    Route::get('branchMaster/destroy/{id}', [branchMasterController::class, 'destroy'])->name('destroy');
    Route::get('branchMaster/edit/{id}', [branchMasterController::class, 'edit'])->name('branchMasterEdit');
    Route::post('branchMaster/update', [branchMasterController::class, 'update'])->name('branchUpdate');
    //MASTER BRANCH END

    // Master Agent / Broker Registration
    Route::get('agent_reg', [agentRegMasterController::class, 'index'])->name('agent_reg');
    Route::post('agent_reg_store', [agentRegMasterController::class, 'agent_reg_store'])->name('agent_reg_store');
    Route::get('agent_destroy/{id}', [agentRegMasterController::class, 'agent_destroy'])->name('agent_destroy');
    Route::get('agent_list_destroy/{id}', [agentRegMasterController::class, 'agent_list_destroy'])->name('agent_list_destroy');
    Route::get('agent_reg_edit/edit/{id}', [agentRegMasterController::class, 'agent_edit'])->name('agent_reg_edit');
    Route::post('agent_reg_update', [agentRegMasterController::class, 'agent_update'])->name('agent_reg_update');
    // Route::get('get-bank-details/{agentId}', [agentRegMasterController::class, 'showBankDetails']);
    Route::get('/viewserviceareas', [agentRegMasterController::class, 'viewserviceareas'])->name('viewserviceareas');

    //firm master
    Route::get('/firmviewserviceareas', [FirmController::class, 'firmviewserviceareas'])->name('firmviewserviceareas');
    Route::get('firm_reg', [FirmController::class, 'index'])->name('firm_reg');
    Route::post('firm_reg_store', [FirmController::class, 'firm_reg_store'])->name('firm_reg_store');
    Route::get('firm_destroy/{id}', [FirmController::class, 'firm_destroy'])->name('firm_destroy');
    Route::get('firm_list_destroy/{id}', [FirmController::class, 'firm_list_destroy'])->name('firm_list_destroy');
    Route::get('firm_reg_edit/edit/{id}', [FirmController::class, 'firm_edit'])->name('firm_reg_edit');
    Route::post('firm_reg_update', [FirmController::class, 'firm_update'])->name('firm_reg_update');

    //land owner controller
    Route::post('/land-payment/', [LandownerController::class, 'storepayment'])->name('storepayment');

    Route::get('/landviewserviceareas', [LandownerController::class, 'landviewserviceareas'])->name('landviewserviceareas');
    Route::get('land_owner_reg', [LandownerController::class, 'index'])->name('land_owner_reg');
    Route::post('land_owner_reg_store', [LandownerController::class, 'land_owner_reg_store'])->name('land_owner_reg_store');
    Route::get('land_owner_destroy/{id}', [LandownerController::class, 'land_owner_destroy'])->name('land_owner_destroy');
    Route::get('land_owner_list_destroy/{id}', [LandownerController::class, 'land_owner_list_destroy'])->name('land_owner_list_destroy');
    Route::get('land_owner_reg_edit/edit/{id}', [LandownerController::class, 'land_owner_edit'])->name('land_owner_reg_edit');
    Route::post('land_owner_reg_update', [LandownerController::class, 'land_owner_reg_update'])->name('land_owner_reg_update');
    Route::post('/api/agents', [LandownerController::class, 'getAgentById'])->name('agents.show');
    Route::post('/land_purchase/store', [LandownerController::class, 'store'])->name('landpurchase.store');
    Route::get('/get-payment-data', [LandownerController::class, 'getPaymentData'])->name('getPaymentData');
    Route::get('/get-payment-details', [LandownerController::class, 'getPaymentDetails'])->name('getPaymentDetails');

    // Route to update payment record
    Route::put('/update-payment', [LandownerController::class, 'updatePayment'])->name('updatePayment');
    Route::delete('/delete-payment', [LandownerController::class, 'deletePayment'])->name('deletePayment');
    //Accountmaster
    Route::get('/expense-entry', [AccountController::class, 'exepence_entry'])->name('expense.entry');
    Route::get('/expense-master', [AccountController::class, 'exepence_master'])->name('expense.master');
    Route::get('/expense-income', [AccountController::class, 'income'])->name('expense.income');
    //FollowUp leads controller

    Route::get('/enquiry-follow-up', [FollowupLeads::class, 'getEnquiryFollowUp'])->name('enquiry.follow-up');

    Route::post('/folloupstore', [FollowupLeads::class, 'folloupstore'])->name('folloupstore');

    Route::post('/changeplot/update', [FollowupLeads::class, 'changeplot'])->name('changeplot.update');

    Route::get('/enquiry/data', [FollowupLeads::class, 'getEnquiryData'])->name('get.enquiry.data');

    Route::post('/update-client-status', [FollowupLeads::class, 'updateClientStatus'])->name('update_client_status');

    Route::get('newclientindex', [FollowupLeads::class, 'newclientindex'])->name('newclientindex');
    Route::get('proposalindex', [FollowupLeads::class, 'proposalindex'])->name('proposalindex');

    Route::get('tokenindex', [FollowupLeads::class, 'tokenindex'])->name('tokenindex');

    Route::get('visitindex', [FollowupLeads::class, 'visitindex'])->name('visitindex');

    Route::get('followupindex', [FollowupLeads::class, 'followupindex'])->name('followupindex');

    Route::get('negotiationindex', [FollowupLeads::class, 'negotiationindex'])->name('negotiationindex');
    Route::get('allenquiry', [FollowupLeads::class, 'allenquiry'])->name('allenquiry');

    //my downline controller

    Route::get('downlineindex', [MyDownline::class, 'downlineindex'])->name('downlineindex');
    Route::get('get_downline_list', [MyDownline::class, 'get_downline_list'])->name('get_downline_list');
    Route::get('positionindex', [MyDownline::class, 'positionindex'])->name('positionindex');
    Route::get('downlinebuisnessindex', [MyDownline::class, 'downlinebuisnessindex'])->name('downlinebuisnessindex');

    Route::get('/commission-plans', [CommissionPlanController::class, 'index'])->name('commission-plans.index');
    Route::post('/commission-plans', [CommissionPlanController::class, 'store'])->name('commission-plans.store');
    Route::get('/commission-plans/{commissionPlan}/edit', [CommissionPlanController::class, 'edit'])->name('commission-plans.edit');
    Route::put('/commission-plans/{commissionPlan}', [CommissionPlanController::class, 'update'])->name('commission-plans.update');
    Route::delete('/commission-plans/{commissionPlan}', [CommissionPlanController::class, 'destroy'])->name('commission-plans.destroy');

    // Master Employ Registration
    Route::get('emp_reg', [empRegMasterController::class, 'index'])->name('emp_reg');
    Route::post('emp_reg_store', [empRegMasterController::class, 'emp_reg_store'])->name('emp_reg_store');
    Route::get('emp_destroy/{id}', [empRegMasterController::class, 'emp_destroy'])->name('emp_destroy');
    Route::get('emp_list_destroy/{id}', [empRegMasterController::class, 'emp_list_destroy'])->name('emp_list_destroy');
    Route::get('emp_reg_edit/edit/{id}', [empRegMasterController::class, 'emp_reg_edit'])->name('emp_reg_edit');
    Route::post('emp_reg_update', [empRegMasterController::class, 'emp_reg_update'])->name('emp_reg_update');
    Route::get('get_bank_details', [empRegMasterController::class, 'getBankDetails'])->name('getBankDetails');

    // Master Customer Registration
    Route::get('customerReg', [customerRegMasterController::class, 'index'])->name('customerReg');
    Route::post('customer_reg_store', [customerRegMasterController::class, 'cust_Store'])->name('customerRegStore');
    Route::get('customer_reg_destroy/{id}', [customerRegMasterController::class, 'destroy'])->name('customerRegDestroy');
    Route::get('customer_reg_edit/{id}', [customerRegMasterController::class, 'edit'])->name('edit');
    Route::post('customer_reg_update', [customerRegMasterController::class, 'update'])->name('update');

    // MASTER END

    //expense entry

    Route::post('/expense_store', [AccountController::class, 'expense_store'])->name('expense.store');
    Route::get('/get-sold-plot-details', [AccountController::class, 'get_sold_plot_details'])->name('get-sold-plot-details');
    Route::get('/get-sold-plot-other_charges', [AccountController::class, 'get_sold_plot_other_charges'])->name('get-sold-plot-other_charges');

    // CRMF

    //Enquiry

    Route::get('/enquiry', [EnquiryController::class, 'index'])->name('enquiry');
    Route::post('client-stores', [EnquiryController::class, 'client_store'])->name('client_store');
    Route::post('enquiry-store', [EnquiryController::class, 'enquiry_store'])->name('enquiry_store');
    Route::get('get-projects/{statusId}', [EnquiryController::class, 'getProjects'])->name('getProjects');
    Route::get('getplots/{statusId?}/{projectId?}', [EnquiryController::class, 'getPlots'])->name('getplots');
    Route::get('get-client-details/{clientId}', [EnquiryController::class, 'getClientDetails'])->name('getClientDetails');
    // Route::get('/get-project-details/{statusId}', [EnquiryController::class, 'getProjectDetails']);
    Route::get('/get-project-details/{statusId?}/{projectId?}', [EnquiryController::class, 'getProjectDetails'])->name('get-project-details');
    Route::get('get-plot', [EnquiryController::class, 'get_Plot_list'])->name('get-plot');
    Route::get('getEnquiryData', [EnquiryController::class, 'getEnquiryData'])->name('getEnquiryData');

    // In your routes file (web.php)

    Route::get('/projects-by-firm/{firm_id}', [ProjectEntryController::class, 'getProjectsByFirm'])->name('projects.by.firm');
    Route::get('/fetch-plots-details', [ProjectEntryController::class, 'fetchPlotDetails'])->name('fetchPlotDetails');
    Route::get('/fetch-project-detailsextra', [ProjectEntryController::class, 'fetchProjectDetailsextra'])->name('fetchProjectDetailsextra');

    //plot transfer
    Route::get('/plot-transfer/{id}/{type}', [PlotTransfercontroller::class, 'plottransfer'])->name('plot.transfer');
    Route::post('/plot-transfers/create/{id}', [PlotTransferController::class, 'plot_transfer_store'])->name('plot-transfers.store');
    Route::post('/user-transfer-plot/create/{id}', [PlotTransferController::class, 'user_transfer_plot_store'])->name('user-transfer-plot.store');
    Route::get('/plot-transfers/delete/{id}', [PlotTransferController::class, 'plot_transfer_delete'])->name('plot-transfers.delete');
    Route::get('/plot-transfers/edit/{id}', [PlotTransferController::class, 'plot_transfer_edit'])->name('plot-transfers.edit');
    Route::post('/plot-transfers/update/{id}', [PlotTransferController::class, 'plot_transfer_update'])->name('plot-transfers.update');

    Route::post('/personal-details/create', [PlotTransferController::class, 'personal_details_store'])->name('personal-details.store');
    Route::get('/personal-details/delete/{id}', [PlotTransferController::class, 'personal_details_delete'])->name('personal-details.delete');
    Route::get('/personal-details/edit/{id}', [PlotTransferController::class, 'personal_details_edit'])->name('personal-details.edit');
    Route::post('/personal-details/update/{id}', [PlotTransferController::class, 'personal_details_update'])->name('personal-details.update');

    Route::get('/plot-shifting', [PlotTransfercontroller::class, 'plotShifting'])->name('plot.shifting');

    Route::get('/plot-edit-sale', [PlotTransfercontroller::class, 'plotedit_Sale'])->name('plot.edit.sale');

    Route::get('/plot-edit-bank-loan-details', [PlotTransfercontroller::class, 'plotedit_bank_loan_details'])->name('plot.edit.bank.details');

    // //section B
    // Route::get('/project-entry', [ProjectEntryController::class, 'index'])->name('project.index');
    // Route::get('/addedproject-entry', [ProjectEntryController::class, 'addedProjectEntry'])->name('project.addedProjectEntry');
    // Route::post('/project-store', [ProjectEntryController::class, 'store'])->name('project.store');

    // -----------------------------------------------------------------------------------------------------------

    // WEBSITE

    //follow up

    Route::get('/follow_up', [FollowUpController::class, 'index'])->name('follow_up');
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('/registration-Checklist', [CustomeStagesController::class, 'registrationChecklist'])->name('registrationChecklist');
    //intiate sales

    Route::post('/agreement-master/store', [AgreementMasterController::class, 'store'])->name('agrrementmaster.store');
    Route::get('agreement-master/{id}', [AgreementMasterController::class, 'destroy'])->name('agreement-master.destroy');

    Route::get('/agreements/{id}', [AgreementMasterController::class, 'show'])->name('agreements.show');
    Route::get('agreement-master/{id}/edit', [AgreementMasterController::class, 'edit'])->name('agreement-master.edit');
    Route::post('agreement-master/{id}/update', [AgreementMasterController::class, 'update'])->name('agreement-master.update');
    Route::get('/agrrement-master', [AgreementMasterController::class, 'index'])->name('agrrementmaster');
    Route::delete('/delete-nominee/{id}', [InitiatesellController::class, 'deleteNominee'])->name('delete.nominee');
    Route::delete('/delete-client/{id}', [InitiatesellController::class, 'deleteClient'])->name('delete.client');

    Route::get('/initiate-sale', [InitiatesellController::class, 'initiatesale'])->name('initiatesale');
    Route::get('/fetch-plots', [InitiatesellController::class, 'fetchPlots'])->name('fetchPlots');
    Route::get('/fetchPlotspaymentsection', [InitiatesellController::class, 'fetchPlotspaymentsection'])->name('fetchPlotspaymentsection');

    Route::post('/initiatesale/store', [InitiatesellController::class, 'store'])->name('initiatesale_store');

    Route::get('/check-status/{id}', [CustomeStagesController::class, 'checkStatus'])->name('checkstatusforregistrationcomplete_legalclrarance');
    Route::post('/registration-complete-approve', [InitiatesellController::class, 'registrationcompleteapprove'])->name('registrationcompleteapprove_legalclrarance');
    Route::post('/registration-complete-approve-with-date', [InitiatesellController::class, 'registrationcompleteapprove_legalclrarance_with_date'])->name('registrationcompleteapprove_legalclrarance_with_date');
    Route::post('/registrationcomplete-with-date-file', [InitiatesellController::class, 'registrationcomplete_with_date_file'])->name('registrationcomplete_with_date_file');

    Route::post('/handover-with-date-file', [InitiatesellController::class, 'handover_with_date_file'])->name('handover_with_date_file');

    Route::post('/saleded-with-date-file', [InitiatesellController::class, 'saleded_with_date_file'])->name('saleded_with_date_file');

    Route::get('/inquiry-details', [InitiatesellController::class, 'showDetails'])->name('inquiry.details');
    Route::get('/inquiry-docs-details', [CustomeStagesController::class, 'showDetails'])->name('inquiry.docs.details');

    Route::put('panel/initiate-sell/{id}', [InitiatesellController::class, 'update'])->name('panel.initiate-sell.update');

    Route::get('/getClientProjectPlotDatatwo', [PaymentCollectionController::class, 'getClientProjectPlotDatatwo'])->name('getClientProjectPlotDatatwo');
    Route::post('/upload-documents', [PaymentCollectionController::class, 'documentstore'])->name('upload.documents');
    Route::get('/get-documents', [PaymentCollectionController::class, 'documentindex'])->name('get.documents');
    Route::get('/fetchDocuments', [PaymentCollectionController::class, 'fetchDocuments'])->name('document.fetch');

    Route::get('/getClientIdByPlot', [PaymentCollectionController::class, 'getClientIdByPlot'])->name('getClientIdByPlot');

    Route::get('/get-client-project-plot-data', [PaymentCollectionController::class, 'getClientProjectPlotData'])->name('getClientProjectPlotData');
    Route::get('/search_payment_collection_agains_client', [PaymentCollectionController::class, 'search_payment_collection_agains_client'])->name('search_payment_collection_agains_client');
    Route::post('/document_payment_installment', [PaymentCollectionController::class, 'store_payment_installment'])->name('store_payment_installment');
    Route::post('/update_installment', [PaymentCollectionController::class, 'update_installment'])->name('update_installment');
    Route::post('/othercharge_store', [PaymentCollectionController::class, 'othercharge_store'])->name('othercharge_store');
    Route::get('/get-other-charges', [PaymentCollectionController::class, 'getOtherCharges'])->name('get.other.charges');

    Route::get('/newsale-sale', [InitiatesellController::class, 'newsale'])->name('newsale');
    Route::delete('/newsale-sale-delete/{id}', [InitiatesellController::class, 'delete'])->name('newsale_delete');
    Route::get('/newsale-sale-edit/{id}', [InitiatesellController::class, 'edit'])->name('newsale_edit');

    Route::get('/payment-collection', [PaymentCollectionController::class, 'paymentcollection'])->name('paymentcollection');
    Route::get('/account', [CustomeStagesController::class, 'account'])->name('account');
    Route::get('/legalclearance', [CustomeStagesController::class, 'legalclearance'])->name('legalclearance');

    Route::get('/registration', [CustomeStagesController::class, 'registration'])->name('registration');

    Route::get('/registration-completed', [CustomeStagesController::class, 'registrationcompleted'])->name('registrationcompleted');
    Route::get('/handover', [CustomeStagesController::class, 'handover'])->name('handover');
    Route::get('/saledeed-scan', [CustomeStagesController::class, 'saledeedscan'])->name('saledeedscan');

    //section B
    Route::get('/project-entry', [ProjectEntryController::class, 'index'])->name('project.index');
    Route::get('/addedproject-entry', [ProjectEntryController::class, 'addedProjectEntry'])->name('project.addedProjectEntry');
    Route::post('/project-store', [ProjectEntryController::class, 'store'])->name('project.store');
    Route::delete('/project-delete/{id}', [ProjectEntryController::class, 'destroy'])->name('project.destroy');
    Route::get('/viewservicearea', [ProjectEntryController::class, 'viewservicearea'])->name('viewservicearea');
    // Assuming you are using Laravel's resourceful route naming conventions
    Route::get('projects/{id}/edit', [ProjectEntryController::class, 'edit'])->name('project.edit');
    Route::put('projects/{id}', [ProjectEntryController::class, 'update'])->name('project.update');
    Route::get('/project-delete-layout-image/{id}', [ProjectEntryController::class, 'deleteImage'])->name('project.delete-layout-image');
    Route::get('/project-delete-layout-data/{id}', [ProjectEntryController::class, 'deletedata'])->name('project.delete-layout-data');
    Route::get('/project-delete-faqs/{id}', [ProjectEntryController::class, 'deletefaqs'])->name('project.delete-faqs');
    Route::post('/project-bulkploat', [ProjectEntryController::class, 'bulkploat'])->name('bulkploat');
    Route::post('/project-bulkploatappendatrow', [ProjectEntryController::class, 'bulkploatappendatrow'])->name('bulkploatappendatrow');

    Route::post('/update_entry_level_lead', [LeadassignToEmployeeController::class, 'update_entry_level_lead'])->name('update_entry_level_lead');

    Route::get('/crm_lead_management', [LeadassignToEmployeeController::class, 'index'])->name('crm_lead_management');
    Route::post('/raw-leads-by-employee', [LeadassignToEmployeeController::class, 'import'])->name('employees.import');
    Route::post('/fetchLeadDetails', [LeadassignToEmployeeController::class, 'fetchLeadDetails'])->name('fetchLeadDetails');
    Route::post('/entry-level-lead-details', [LeadassignToEmployeeController::class, 'entrylevelformleadStore'])->name('entrylevelformleadStore');

    Route::get('/fetch-entry-level-lead-details', [LeadassignToEmployeeController::class, 'fetchentrylevelformleadStore'])->name('fetchentrylevelformleadStore');

    Route::post('/update_whatsapp', [MasterController::class, 'update_whatsapp'])->name('update_whatsapp');

    //landowner
    Route::get('/landowner-index', [LandownerController::class, 'index'])->name('landowner_index');
    Route::get('/landowner-account', [LandownerController::class, 'account'])->name('landowner_account');

    //usermodel controller

    Route::get('/fetchPlotspaymentsectionbyuser', [UserModelController::class, 'fetchPlotspaymentsectionbyuser'])->name('fetchPlotspaymentsectionbyuser');

    Route::get('/getProjectsByFirmbyuser/{firm_id}', [UserModelController::class, 'getProjectsByFirmbyuser'])->name('getProjectsByFirmbyuser.firm');
    Route::get('/user-model-dashboard', [UserModelController::class, 'userdashboard'])->name('user_model.dashboard');
    Route::get('/user-model-payment-collection', [UserModelController::class, 'paymentcollection'])->name('user_model.paymentcollection');
    Route::get('/user-model-initiate-sale', [UserModelController::class, 'userinitiatesale'])->name('user_model.initiatesale');
    Route::get('/user-model-new-sale', [UserModelController::class, 'usernewsale'])->name('user_model.newsale');
    Route::get('/user-model-registration', [UserModelController::class, 'userregistration'])->name('user_model.registration');
    Route::get('/user-model-account', [UserModelController::class, 'useraccount'])->name('user_model.account');
    Route::get('/user-model-legal-clearance', [UserModelController::class, 'userlegalclearance'])->name('user_model.legalclearance');
    Route::get('/user-model-registration-completed', [UserModelController::class, 'userregistrationcompleted'])->name('user_model.registrationcompleted');
    Route::get('/user-model-saledeed-scan', [UserModelController::class, 'usersaledeedscan'])->name('user_model.saledeedscan');
    Route::get('/user-model-handover', [UserModelController::class, 'userhandover'])->name('user_model.handover');
    Route::get('/user-model-initiate-sale-edit', [UserModelController::class, 'userinitiatesaleedit'])->name('user_model.userinitiatesaleedit');

    Route::post('/user-model-userinitiatesalestore', [UserModelController::class, 'userinitiatesalestore'])->name('user_model.userinitiatesalestore');
    Route::put('/user-model-userinitiatesaleupdate/{id}', [UserModelController::class, 'userinitiatesaleupdate'])->name('user_model.userinitiatesaleupdate');

    Route::delete('/user-model-userinitiatesaledelete/{id}', [UserModelController::class, 'userinitiatesaledelete'])->name('user_model.initiatesaledelete');
    Route::get('/user-model-userinitiatesaleedit/{id}', [UserModelController::class, 'userinitiatesaleedit'])->name('user_model.initiatesaleedit');

    Route::post('/razorpay/callback', [UserModelController::class, 'handleRazorpayCallback'])->name('razorpay.callback');

    Route::post('/get-razorpay-getway', [UserModelController::class, 'getrazorpaygetway'])->name('getrazorpaygetway');
    Route::post('/get-razorpay-payment-complete', [UserModelController::class, 'payment_complete'])->name('payment_complete');
    Route::post('/store_installment_of_user', [UserModelController::class, 'store_installment_of_user'])->name('store_installment_of_user');

    Route::post('/user-create-razorpay-order', [UserModelController::class, 'usercreateRazorpayOrder'])->name('user.create.razorpay.order');
    Route::post('/user-razorpay-callback', [UserModelController::class, 'userhandleRazorpayCallback'])->name('user.razorpay.callback');
});
