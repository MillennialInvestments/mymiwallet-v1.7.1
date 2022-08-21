<?php /* /users/views/user_fields.php */
$cuID									= $_SESSION['allSessionData']['userAccount']['cuID'];
$cuRole									= $_SESSION['allSessionData']['userAccount']['cuRole'];
$cuEmail								= $_SESSION['allSessionData']['userAccount']['cuEmail'];
$cuWalletID								= $_SESSION['allSessionData']['userAccount']['cuWalletID'];
$cuWalletCount							= $_SESSION['allSessionData']['userAccount']['cuWalletCount'];
$cuTotalWalletCount						= $_SESSION['allSessionData']['userAccount']['cuTotalWalletCount'];
$walletID								= $_SESSION['allSessionData']['userAccount']['walletID'];
$walletTitle							= $_SESSION['allSessionData']['userAccount']['walletTitle'];
$walletBroker							= $_SESSION['allSessionData']['userAccount']['walletBroker'];
$walletNickname							= $_SESSION['allSessionData']['userAccount']['walletNickname'];
$walletDefault							= $_SESSION['allSessionData']['userAccount']['walletDefault'];
$walletExchange							= $_SESSION['allSessionData']['userAccount']['walletExchange'];
$walletMarketPair						= $_SESSION['allSessionData']['userAccount']['walletMarketPair'];
$walletMarket							= $_SESSION['allSessionData']['userAccount']['walletMarket'];
$walletFunds							= $_SESSION['allSessionData']['userAccount']['walletFunds'];
$walletInitialAmount					= $_SESSION['allSessionData']['userAccount']['walletInitialAmount'];
$walletAmount							= $_SESSION['allSessionData']['userAccount']['walletAmount'];
$walletPercentChange					= $_SESSION['allSessionData']['userAccount']['walletPercentChange'];
$walletGains							= $_SESSION['allSessionData']['userAccount']['walletGains'];
$depositAmount							= $_SESSION['allSessionData']['userAccount']['depositAmount'];
$withdrawAmount							= $_SESSION['allSessionData']['userAccount']['withdrawAmount'];
$MyMICoinValue							= $_SESSION['allSessionData']['userAccount']['MyMICoinValue'];
$MyMICCurrentValue						= $_SESSION['allSessionData']['userAccount']['MyMICCurrentValue'];
$MyMICCoinSum							= $_SESSION['allSessionData']['userAccount']['MyMICCoinSum'];
$MyMIGoldValue							= $_SESSION['allSessionData']['userAccount']['MyMIGoldValue'];
$MyMIGCurrentValue						= $_SESSION['allSessionData']['userAccount']['MyMIGCurrentValue'];
$MyMIGCoinSum							= $_SESSION['allSessionData']['userAccount']['MyMIGCoinSum'];
$lastTradeActivity                      = $_SESSION['allSessionData']['userAccount']['lastTradeActivity'];
// $walletData								= $_SESSION['allSessionData']['userAccount']['walletData'];
$getWallets								= $_SESSION['allSessionData']['userAccount']['getWallets'];
$assetNetValue                          = $_SESSION['allSessionData']['userAccount']['assetNetValue'];
$assetTotalCount                        = $_SESSION['allSessionData']['userAccount']['assetTotalCount'];
$assetTotalGains                        = $_SESSION['allSessionData']['userAccount']['assetTotalGains'];
$walletCost								= $this->config->item('wallet_cost');  			 		// $5
$gas_fee								= $this->config->item('gas_fee');
$trans_fee								= $this->config->item('trans_fee');
$trans_percent							= $this->config->item('trans_percent');
$expenses								= ($walletCost * $trans_percent) + $trans_fee;			// Total Fees
$total_fees								= number_format($expenses, 2);
$fee_coins								= round(($MyMICoinValue), 8);
$walletCoins							= ($walletCost / $MyMICoinValue) + $fee_coins;
$remainingCoins							= $MyMICCoinSum - $walletCoins;
$getUserAssetInfo                       = $this->exchange_model->get_user_asset_info($cuID);
if (!empty($getUserAssetInfo->result_array())) {
    $userAssetInfo                      = $getUserAssetInfo;
} else {
    $userAssetInfo                      = '';
}
$getAssetListingRequest                 = $this->exchange_model->get_asset_listing_requests($cuID);
// print_r($getAssetListingRequest->result_array());
if (!empty($getAssetListingRequest)) {
    $assetListingRequest                = $getAssetListingRequest;
} else {
    $assetListingRequest                = '';
}
$dashboardData							= array(
    'getWallets'						=> $getWallets,
    'cuID'								=> $cuID,
    'cuWalletCount'						=> $cuWalletCount,
    'cuTotalWalletCount'				=> $cuTotalWalletCount,
    'walletID'							=> $walletID,
    'walletTitle'						=> $walletTitle,
    'walletAmount'						=> $walletAmount,
    'walletFunds'						=> $walletFunds,
    'walletGains'						=> $walletGains,
    'MyMICCoinSum'						=> $MyMICCoinSum,
    'MyMICCurrentValue'					=> $MyMICCurrentValue,
    'MyMIGCoinSum'						=> $MyMIGCoinSum,
    'MyMIGCurrentValue'					=> $MyMIGCurrentValue,
    'lastTradeActivity'					=> $lastTradeActivity,
    'walletCost'						=> $walletCost,
    'walletCoins'						=> $walletCoins,
    'userAssetInfo'                     => $userAssetInfo,
    'assetListingRequest'               => $assetListingRequest,
    'assetNetValue'                     => $assetNetValue,
    'assetTotalCount'                   => $assetTotalCount,
    'assetTotalGains'                   => $assetTotalGains,
);
?>   
<div class="nk-block">
	<div class="row gy-gs">
		<div class="col-md-12 mb-3">  
			<?php $this->load->view('User/Asset_Management/index/header', $dashboardData); ?>
		</div>
		<div class="col-12 col-md-3">
			<?php $this->load->view('User/Asset_Management/index/asset_overview', $dashboardData); ?>
		</div>
		<div class="col-12 col-md-3">
			<?php $this->load->view('User/Asset_Management/index/asset_listing', $dashboardData); ?>
		</div>
        <div class="col-12 col-md-3">
			<?php $this->load->view('User/Asset_Management/index/asset_request', $dashboardData); ?>
		</div>
	</div>
</div>
<hr class="my-5">
<div class="nk-block">
	<div class="row gy-gs">
		<div class="col-md-12 mb-3">  
			<?php //$this->load->view('User/Dashboard/index/market-header', $dashboardData);?>
		</div>
		<div class="col-12 col-md-3">
			<?php //$this->load->view('User/Dashboard/index/US_Market_Overview');?>
		</div>	
		<div class="col-12 col-md-3">
			<?php //$this->load->view('User/Dashboard/index/International_Market_Overview');?>
		</div>
		<div class="col-12 col-md-3">
			<?php //$this->load->view('User/Dashboard/index/Crypto_Market_Overview');?>
		</div>
		<div class="col-12 col-md-3">
			<?php //$this->load->view('User/Dashboard/index/MyMI_Market_Overview');?>
		</div>
	</div>
</div>
<?php
if ($cuRole === '1') {
    echo '<br><br>';
    echo '<h2 class="nk-block-title fw-bold">User Data Transfer</h2>';
    print_r($_SESSION['allSessionData']);
    echo '<br><br>';
    print_r($dashboardData);
}
?>

