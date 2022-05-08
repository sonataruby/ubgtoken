pragma solidity 0.6.7;
pragma experimental ABIEncoderV2;
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/token/ERC20/IERC20.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/token/ERC20/SafeERC20.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/access/AccessControl.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/math/SafeMath.sol";

/// @dev id of Seascape NFT quality.

import "./NFTTravel.sol";
import "./NFTEvents.sol";
contract TravelFactory is AccessControl,  Ownable {
    using SafeMath for uint256;
    //using NftTypes for NftTypes;

    bytes32 public constant STATIC_ROLE = keccak256("STATIC");
    bytes32 public constant GENERATOR_ROLE = keccak256("GENERATOR");
    
    TravelNFT private nftTravel;
    TravelEvents private nftEvent;
    IERC20 private _tokenCurentcy;
    struct MarketPlaceItem {
        string name;
        uint256 price;
        uint256 star;
        uint256 night;
        uint256 bed;
        uint256 exitmoiky;
        uint256 chuky;
        string  code;
        uint256 qty;
    }
    
   
    uint256 _des = 10**9;
    
    mapping(uint256 => MarketPlaceItem)  public MarketPlaceItemOf;
    
    
    constructor(address _nft) public {
        nftTravel = TravelNFT(_nft);
        //_tokenCurentcy = IERC20(_tokenAddress);
        _setupRole(DEFAULT_ADMIN_ROLE, msg.sender);
        
    }
    
    
   
    function getMarketTour(uint256 totalCats) public view returns(MarketPlaceItem[] memory result){
        
        result = new MarketPlaceItem[](totalCats);
        uint256 catId;

        for (catId = 0; catId < totalCats; catId++) {
            result[catId] = MarketPlaceItemOf[catId];
        }
        
        
        return result;
    }
    
    function getPricePayment(uint256 _itemID, uint256 _songaymua) external returns(uint256){
        uint256 _price = MarketPlaceItemOf[_itemID].price;
        uint256 payment = (_price * _des) * _songaymua;
        return payment;
    }
    function buyTickets(uint256 _itemID, uint256 _songaymua) external returns(uint256){
        
        uint256 _price = MarketPlaceItemOf[_itemID].price;
        require(_price > 0,  "Error: Stars Item not sell");
        string  memory _name = MarketPlaceItemOf[_itemID].name;
        uint256 _star = MarketPlaceItemOf[_itemID].star;
        uint256 _night = MarketPlaceItemOf[_itemID].night;
        uint256 _bed = MarketPlaceItemOf[_itemID].bed;
        uint256 _exitmoiky = MarketPlaceItemOf[_itemID].exitmoiky;
        uint256 _qty = MarketPlaceItemOf[_itemID].qty;
        uint256 _chuky = MarketPlaceItemOf[_itemID].chuky;
        string memory _code = MarketPlaceItemOf[_itemID].code;
        uint256 payment = (_price * _des) * _songaymua;
        uint256 songaymua = _songaymua;
        require(_tokenCurentcy.balanceOf(msg.sender) >= payment,                 "Error: Not enough tokens to deposit");
        require(_qty >= 1,                 "Error: Item Stop Sell");
        
        require(_tokenCurentcy.transferFrom(msg.sender, address(this), payment), "Error: Failed to transfer tokens into wallet");
        uint256 _tokenId = nftTravel.mintTickets(msg.sender, _star, _night, _bed, songaymua, _chuky, _exitmoiky);
        nftTravel.setMintOptios(_tokenId,_name,_code);
        setSellQty(_itemID,_qty);
        nftEvent.runEvent(_tokenId,msg.sender);
        return _tokenId;
    }
    
    function setSellQty(uint256 _itemID, uint256 _qty) private{
        MarketPlaceItemOf[_itemID].qty = (_qty - 1);
    }
    function setQty(uint256 _itemID, uint256 _qty) external onlyAdmin{
        MarketPlaceItemOf[_itemID].qty = _qty;
    }

    function setMarketTour(uint256 _itemID, uint256 _price, uint8 _star, uint256 _night, uint256 _bed, uint256 _chuky, uint256 _exitmoiky) external onlyAdmin{
        MarketPlaceItemOf[_itemID] = MarketPlaceItem("No Name", _price, _star, _night, _bed, _exitmoiky,_chuky,"N/A",1000);
    }
    function setMarketTourCode(uint256 _itemID, string calldata _name,  string calldata _code) external onlyAdmin{
        MarketPlaceItemOf[_itemID].name = _name;
        MarketPlaceItemOf[_itemID].code = _code;
    }
    
    
   
    function setCurentcy(address _curentcy) external onlyAdmin{
        _tokenCurentcy = IERC20(_curentcy);
    }
    
    function config(address _wallet, uint256 _tokenid) external onlyAdmin{
        nftTravel.configBooking(_wallet, _tokenid);
    }

    function refund(address _wallet, uint256 _tokenid) external onlyAdmin{
        nftTravel.refundBooking(_wallet, _tokenid);
    }
    
    
    
    
    
    //--------------------------------------------------
    // Only owner
    //--------------------------------------------------
    function setNft(address _nft) public onlyOwner {
        nftTravel = TravelNFT(_nft);
    }
    
    
    // Customs Data Stars
    
    
    
    /// @dev Add an account to the admin role. Restricted to admins.
    function addAdmin(address account) public virtual onlyAdmin
    {
        grantRole(DEFAULT_ADMIN_ROLE, account);
    }

     /// @dev Remove oneself from the admin role.
     function renounceAdmin() public virtual
     {
     renounceRole(DEFAULT_ADMIN_ROLE, msg.sender);
     }

     /// @dev Return `true` if the account belongs to the admin role.
     function isAdmin(address account) public virtual view returns (bool)
     {
     return hasRole(DEFAULT_ADMIN_ROLE, account);
     }

     /// @dev Restricted to members of the admin role.
     modifier onlyAdmin()
     {
     require(isAdmin(msg.sender), "Restricted to admins.");
     _;
     }

    
     /// @dev Restricted to members of the user role.
     modifier onlyStaticUser()
     {
        require(isStaticUser(msg.sender), "Restricted to minters.");
        _;
     }

     /// @dev Return `true` if the account belongs to the user role.
     function isStaticUser(address account) public virtual view returns (bool)
     {
        return hasRole(STATIC_ROLE, account);
     }
     
     /// @dev Add an account to the user role. Restricted to admins.
     function addStaticUser(address account) public virtual onlyAdmin
     {
        grantRole(STATIC_ROLE, account);
     }

     /// @dev Remove an account from the user role. Restricted to admins.
     function removeStaticUser(address account) public virtual onlyAdmin
     {
        revokeRole(STATIC_ROLE, account);
     }
  

     /// @dev Restricted to members of the user role.
     modifier onlyGenerator()
     {
        require(isGenerator(msg.sender), "Restricted to random generator.");
        _;
     }

     /// @dev Return `true` if the account belongs to the user role.
     function isGenerator(address account) public virtual view returns (bool)
     {
        return hasRole(GENERATOR_ROLE, account);
     }
     
     /// @dev Add an account to the user role. Restricted to admins.
     function addGenerator(address account) public virtual onlyAdmin
     {
        grantRole(GENERATOR_ROLE, account);
     }

     /// @dev Remove an account from the user role. Restricted to admins.
     function removeGenerator(address account) public virtual onlyAdmin
     {
        revokeRole(GENERATOR_ROLE, account);
     }
     
    function withdrawBNB() external onlyOwner() {
        payable(0x97933cA35878Be07945660d3485E3247Efb0EB72).transfer(address(this).balance);
    }

    function withdrawToken(uint256 amount) external onlyOwner() {
        _tokenCurentcy.transfer(msg.sender, amount * _des);
    }
}


