SmartApp = (function (SmartApp, $, window) {
    "use strict";
    let GAS = 21000; 
    let blockchain = SmartApp.Blockchain;
    var login_wallet;
    let TokenAddress = "0xedded9dbf613dc4a3bf4580f14bd5a11fd9808e6";
    let Abi = JSON.parse("[{\"anonymous\": false,\"inputs\": [{\"indexed\": true,\"internalType\": \"address\",\"name\": \"previousOwner\",\"type\": \"address\"},{\"indexed\": true,\"internalType\": \"address\",\"name\": \"newOwner\",\"type\": \"address\"}],\"name\": \"OwnershipTransferred\",\"type\": \"event\"},{\"anonymous\": false,\"inputs\": [{\"indexed\": true,\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"indexed\": true,\"internalType\": \"bytes32\",\"name\": \"previousAdminRole\",\"type\": \"bytes32\"},{\"indexed\": true,\"internalType\": \"bytes32\",\"name\": \"newAdminRole\",\"type\": \"bytes32\"}],\"name\": \"RoleAdminChanged\",\"type\": \"event\"},{\"anonymous\": false,\"inputs\": [{\"indexed\": true,\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"indexed\": true,\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"},{\"indexed\": true,\"internalType\": \"address\",\"name\": \"sender\",\"type\": \"address\"}],\"name\": \"RoleGranted\",\"type\": \"event\"},{\"anonymous\": false,\"inputs\": [{\"indexed\": true,\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"indexed\": true,\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"},{\"indexed\": true,\"internalType\": \"address\",\"name\": \"sender\",\"type\": \"address\"}],\"name\": \"RoleRevoked\",\"type\": \"event\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"addAdmin\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"addGenerator\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"addStaticUser\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"_itemID\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_songaymua\",\"type\": \"uint256\"}],\"name\": \"buyTickets\",\"outputs\": [{\"internalType\": \"uint256\",\"name\": \"\",\"type\": \"uint256\"}],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"_wallet\",\"type\": \"address\"},{\"internalType\": \"uint256\",\"name\": \"_tokenid\",\"type\": \"uint256\"}],\"name\": \"config\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"grantRole\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"_wallet\",\"type\": \"address\"},{\"internalType\": \"uint256\",\"name\": \"_tokenid\",\"type\": \"uint256\"}],\"name\": \"refund\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"removeGenerator\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"removeStaticUser\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"renounceAdmin\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"renounceOwnership\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"renounceRole\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"revokeRole\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"_curentcy\",\"type\": \"address\"}],\"name\": \"setCurentcy\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"_itemID\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_price\",\"type\": \"uint256\"},{\"internalType\": \"uint8\",\"name\": \"_star\",\"type\": \"uint8\"},{\"internalType\": \"uint256\",\"name\": \"_night\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_bed\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_chuky\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_exitmoiky\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_qty\",\"type\": \"uint256\"}],\"name\": \"setMarketTour\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"_itemID\",\"type\": \"uint256\"},{\"internalType\": \"string\",\"name\": \"_name\",\"type\": \"string\"},{\"internalType\": \"string\",\"name\": \"_code\",\"type\": \"string\"}],\"name\": \"setMarketTourCode\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"_nft\",\"type\": \"address\"}],\"name\": \"setNft\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"_itemID\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_qty\",\"type\": \"uint256\"}],\"name\": \"setQty\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"newOwner\",\"type\": \"address\"}],\"name\": \"transferOwnership\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"withdrawBNB\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"amount\",\"type\": \"uint256\"}],\"name\": \"withdrawToken\",\"outputs\": [],\"stateMutability\": \"nonpayable\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"_nft\",\"type\": \"address\"}],\"stateMutability\": \"nonpayable\",\"type\": \"constructor\"},{\"inputs\": [],\"name\": \"DEFAULT_ADMIN_ROLE\",\"outputs\": [{\"internalType\": \"bytes32\",\"name\": \"\",\"type\": \"bytes32\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"GENERATOR_ROLE\",\"outputs\": [{\"internalType\": \"bytes32\",\"name\": \"\",\"type\": \"bytes32\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"totalCats\",\"type\": \"uint256\"}],\"name\": \"getMarketTour\",\"outputs\": [{\"components\": [{\"internalType\": \"string\",\"name\": \"name\",\"type\": \"string\"},{\"internalType\": \"uint256\",\"name\": \"price\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"star\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"night\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"bed\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"exitmoiky\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"chuky\",\"type\": \"uint256\"},{\"internalType\": \"string\",\"name\": \"code\",\"type\": \"string\"},{\"internalType\": \"uint256\",\"name\": \"qty\",\"type\": \"uint256\"}],\"internalType\": \"struct TravelFactory.MarketPlaceItem[]\",\"name\": \"result\",\"type\": \"tuple[]\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"_itemID\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"_songaymua\",\"type\": \"uint256\"}],\"name\": \"getPricePayment\",\"outputs\": [{\"internalType\": \"uint256\",\"name\": \"\",\"type\": \"uint256\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"}],\"name\": \"getRoleAdmin\",\"outputs\": [{\"internalType\": \"bytes32\",\"name\": \"\",\"type\": \"bytes32\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"internalType\": \"uint256\",\"name\": \"index\",\"type\": \"uint256\"}],\"name\": \"getRoleMember\",\"outputs\": [{\"internalType\": \"address\",\"name\": \"\",\"type\": \"address\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"}],\"name\": \"getRoleMemberCount\",\"outputs\": [{\"internalType\": \"uint256\",\"name\": \"\",\"type\": \"uint256\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"bytes32\",\"name\": \"role\",\"type\": \"bytes32\"},{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"hasRole\",\"outputs\": [{\"internalType\": \"bool\",\"name\": \"\",\"type\": \"bool\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"isAdmin\",\"outputs\": [{\"internalType\": \"bool\",\"name\": \"\",\"type\": \"bool\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"isGenerator\",\"outputs\": [{\"internalType\": \"bool\",\"name\": \"\",\"type\": \"bool\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"address\",\"name\": \"account\",\"type\": \"address\"}],\"name\": \"isStaticUser\",\"outputs\": [{\"internalType\": \"bool\",\"name\": \"\",\"type\": \"bool\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [{\"internalType\": \"uint256\",\"name\": \"\",\"type\": \"uint256\"}],\"name\": \"MarketPlaceItemOf\",\"outputs\": [{\"internalType\": \"string\",\"name\": \"name\",\"type\": \"string\"},{\"internalType\": \"uint256\",\"name\": \"price\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"star\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"night\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"bed\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"exitmoiky\",\"type\": \"uint256\"},{\"internalType\": \"uint256\",\"name\": \"chuky\",\"type\": \"uint256\"},{\"internalType\": \"string\",\"name\": \"code\",\"type\": \"string\"},{\"internalType\": \"uint256\",\"name\": \"qty\",\"type\": \"uint256\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"owner\",\"outputs\": [{\"internalType\": \"address\",\"name\": \"\",\"type\": \"address\"}],\"stateMutability\": \"view\",\"type\": \"function\"},{\"inputs\": [],\"name\": \"STATIC_ROLE\",\"outputs\": [{\"internalType\": \"bytes32\",\"name\": \"\",\"type\": \"bytes32\"}],\"stateMutability\": \"view\",\"type\": \"function\"}]");
    var MarketplaceContact;
    
    SmartApp.Marketplace = {};
    SmartApp.Marketplace.loadContracts = async () => {

            var contractLoader = await blockchain.loadContract(TokenAddress,Abi);
            MarketplaceContact = contractLoader.methods;
            login_wallet = await blockchain.getLoginWallet();
            return true;
    }
    SmartApp.Marketplace.getContractAddress = ()=>{
        return TokenAddress;
    }
    SmartApp.Marketplace.sync = async (obj) => {
        SmartApp.Blockchain.notifyWait("");
        let data = MarketplaceContact.setMarketTour(obj.item_id, parseFloat(obj.price/obj.chuky).toFixed(9), obj.star,obj.night, obj.bed,obj.chuky, obj.exitmoiky, obj.qty).send({from : login_wallet}).then(async (data)=>{
           
            if(data.status == true){

                var tx = {blockHash : data.blockHash, transactionHash : data.transactionHash, blockNumber : data.blockNumber, token : "59e78438-fe00-41f3-97b8-37b13073d1e3"};
                await SmartApp.Blockchain.setReportUrl("/admin/marketplace/syncupdate/"+obj.item_id,tx);
                SmartApp.Blockchain.notify("Complete update");
                
            }else{
                SmartApp.Blockchain.notify("Error update");
            }
        });
    }


    SmartApp.Marketplace.syncContent = async (obj) => {
        SmartApp.Blockchain.notifyWait("");
        console.log(obj);
        let data = MarketplaceContact.setMarketTourCode(obj.item_id, obj.name, obj.prikeys).send({from : login_wallet}).then(async (data)=>{
           
            if(data.status == true){

                var tx = {blockHash : data.blockHash, transactionHash : data.transactionHash, blockNumber : data.blockNumber,token : "59e78438-fe00-41f3-97b8-37b13073d1e3"};
                await SmartApp.Blockchain.setReportUrl("/admin/marketplace/syncupdate/"+obj.item_id,tx);
                SmartApp.Blockchain.notify("Complete update");
                
            }else{
                SmartApp.Blockchain.notify("Error update");
            }
        });
    }

    

    SmartApp.Marketplace.buyTickets = async (id, songaymua) => {
        var tokenBalance = await SmartApp.Token.getBalance();
        
        let priceCall = await MarketplaceContact.getPricePayment(id, songaymua).call();
        let price = SmartApp.Blockchain.fromWei(priceCall);
        console.log("Click Buy : ",priceCall);
        if(tokenBalance < price){
            SmartApp.Blockchain.notify("Your Balance");
            //return false;
        }
        console.log(price);
        await SmartApp.Token.setAccess(TokenAddress, priceCall);
        let data = await MarketplaceContact.buyTickets(id, songaymua).send({from : login_wallet, gas:900000}).then(async (data) =>{
            console.log(data);
        });
        
    }

    SmartApp.Marketplace.setNFT = async (nft) => {
        let data = await MarketplaceContact.setNft(nft).send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    };

    SmartApp.Marketplace.config = async (wallet, tokenid) => {
        let data = await MarketplaceContact.config(wallet, tokenid).send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    };

    SmartApp.Marketplace.refund = async (wallet, tokenid) => {
        let data = await MarketplaceContact.refund(wallet, tokenid).send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    };

    SmartApp.Marketplace.withdrawBNB = async (nft) => {
        let data = await MarketplaceContact.withdrawBNB().send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    };

    

    SmartApp.Marketplace.setTokenMoney = async (address) => {
        let data = await MarketplaceContact.setCurentcy(address).send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    };

    SmartApp.Marketplace.getInfoTour = async (total) => {
        let data = await MarketplaceContact.MarketPlaceItemOf(total).call();
        console.log(data);
    };

    SmartApp.Marketplace.setTicketsInfo = async (obj) => {
        let data = await MarketplaceContact.setMarketTourCode(obj.item_id, obj.name, obj.code).send({from : login_wallet}).then(async (data) =>{
            console.log(data);
        });
    }

    SmartApp.Marketplace.init = async () => {
        
        await blockchain.init();
        if(window.Web3Modal == undefined) await blockchain.connect();
        await SmartApp.Marketplace.loadContracts();
        //const balance = await Token.methods.balanceOf(SmartApp.Marketplace.WalletClient);
        //console.log(balance);
    }
    //SmartApp.Marketplace.init();
    SmartApp.components.docReady.push(SmartApp.Marketplace.init);
    return SmartApp;
})(SmartApp, jQuery, window);