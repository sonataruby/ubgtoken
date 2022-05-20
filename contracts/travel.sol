// SPDX-License-Identifier: MIT
pragma solidity 0.6.7;
pragma experimental ABIEncoderV2;
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/token/ERC20/IERC20.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/access/Ownable.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/utils/Counters.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/token/ERC721/ERC721.sol";
import "https://raw.githubusercontent.com/sonataruby/seascape-smartcontracts/main/contracts/openzeppelin/contracts/token/ERC721/ERC721Burnable.sol";



contract ReentrancyGuard {
   
    uint256 private constant _NOT_ENTERED = 1;
    uint256 private constant _ENTERED = 2;

    uint256 private _status;
    
    constructor() internal {
        _status = _NOT_ENTERED;
    }

    /**
     * @dev Prevents a contract from calling itself, directly or indirectly.
     * Calling a `nonReentrant` function from another `nonReentrant`
     * function is not supported. It is possible to prevent this from happening
     * by making the `nonReentrant` function external, and make it call a
     * `private` function that does the actual work.
     */
    modifier nonReentrant() {
        // On the first call to nonReentrant, _notEntered will be true
        require(_status != _ENTERED, "ReentrancyGuard: reentrant call");

        // Any calls to nonReentrant after this point will fail
        _status = _ENTERED;

        _;

        // By storing the original value once again, a refund is triggered (see
        // https://eips.ethereum.org/EIPS/eip-2200)
        _status = _NOT_ENTERED;
    }

    function initReentrancyStatus() internal {
        _status = _NOT_ENTERED;
    }
}
contract TravelNFT is ERC721, ERC721Burnable, Ownable, ReentrancyGuard {
    using Counters for Counters.Counter;

    Counters.Counter private tokenId;
    IERC20 _tokenReward;
    bool _tokenRewardEnable = false;
    uint256 _des = 10**9;
    
  
    uint256 private minBookStart = 30;//Ngay Se book
    struct Params {
        string name;
        uint256 star;
        uint256 night;
        uint256 bed;
        uint256 songaymua;//tinh theo thang
        uint256 songayhetky;//tinh theo thang
        string  code;
        uint256 opentime;
        uint256 lastupdate;
        uint256 nightexit;
    }
    
    struct Booking {
        string name;
        string email;
        uint256 phone;
        string passport;
        uint256 checkin;
        uint256 checkout;
        string hotel;
        string code;
    }
    
    struct ClaimEvent {
        uint256 tokenId;
        string code;
    }

    struct RefundBooking {
        
        uint256 night;
        uint256 opentime;
        
    }
    uint256 private timestampDay = 86400;
    string private setCodeReward = "";
    /// @dev minting of seascape nfts are done by factory contract only.
    address private factory;
    address private contractNftWallet;
    
    
    /// @dev returns parameters of StarsBattleNFT by token id.
    mapping(uint256 => Params)  public paramsOf;
    mapping(uint256 => Booking)  public BookingOf;
    mapping(address => mapping(uint256 => RefundBooking))  public RefundBookingOf;
    mapping(address => ClaimEvent)  public ClaimEventOf;
    
    
    event NftReceived(address operator, address from, uint256 tokenId, bytes data);
    event Minted(address indexed owner, uint256 indexed id, string name, uint256 start, uint256 night, uint256 bed, uint256 sonam, uint256 exitsaumoinam, string code, uint256 opentime, uint256 lastupdate);
    
    /**
     * @dev Sets the {name} and {symbol} of token.
     * Initializes {decimals} with a default value of 18.
     * Mints all tokens.
     * Transfers ownership to another account. So, the token creator will not be counted as an owner.
     */
    constructor() public ERC721("UBG NFT", "UBGNFT") {
     //   setPublicChainlinkToken();
        
        tokenId.increment(); // set to 1 the incrementor, so first token will be with id 1.
        _setBaseURI("https://api.ubgtoken.com/nft/");
        
        //_seDefaultLeverReward();
        
        //_tokenReward = IERC20(tokenIRC);
        //LeverRewardOf[5] = LeverReward(5,100);
        //LeverRewardOf[10] = LeverReward(10,200);
    }

    modifier onlyFactory() {
        require(factory == _msgSender(), "NFT SMART: Only NFT Factory can call the method");
        _;
    }
    
   
    
    function mintTickets(address _to,  uint256 _star, uint256 _night, uint256 _bed, uint256 _songaymua, uint256 _songayhetky, uint256 _exitmoiky) public onlyFactory returns(uint256 ) {
        uint256 _tokenId = tokenId.current();

        _safeMint(_to, _tokenId);
        //Obj = Params(Models, Lever, Power, Exp,Speed, Acceleraction, Handing, Nitro, Time}
        uint256 _time = block.timestamp;
        uint256 _timeupdate = block.timestamp;
        string  memory _name = "No Name";
        string  memory _code = "N/A";
        paramsOf[_tokenId] = Params(_name,_star, _night,_bed,_songaymua,_songayhetky,_code, _time, _timeupdate,_exitmoiky);

        tokenId.increment();

        emit Minted(_to, _tokenId, _name, _star, _night, _bed, _songaymua,_songayhetky,_code, _time, _timeupdate);
        return _tokenId;
    }
    
    function setMintOptios(uint256 _tokenId, string memory _name, string memory _code) public onlyFactory returns(uint256 ) {
        paramsOf[_tokenId].name = _name;
        paramsOf[_tokenId].code = _code;
        return _tokenId;
    }
    
    
    
    
   function getTokenOwner(address _owner) external view returns(uint256[] memory){
       uint256 tokenCount = balanceOf(_owner);
       if (tokenCount == 0) {
            // Return an empty array
            return new uint256[](0);
        } else {
            uint256[] memory result = new uint256[](tokenCount);
            uint256 totalCats = totalSupply();
            uint256 resultIndex = 0;
            uint256 catId;

            for (catId = 1; catId <= totalCats; catId++) {
                uint256 _ownerIndex = tokenByIndex(catId-1);
                address _ownerToken = ownerOf(_ownerIndex);
                if (_ownerIndex > 0 && _ownerToken == _owner) {
                    result[resultIndex] = _ownerIndex;
                    resultIndex++;
                }
                //uint256 ownerToken = ownerOf(_owner);
            }

            
            return result;
        }
   }
    
    
    
    function checkExitTime(uint256 _tokenId) private returns(uint256){
        uint256 _timenow = block.timestamp;
        //uint256 _exitmoinam = paramsOf[_tokenId].exitmoinam;
        //uint256 _timestart = paramsOf[_tokenId].opentime;

        uint256 _time = paramsOf[_tokenId].opentime;
        
        uint256 _songayhetky = paramsOf[_tokenId].songayhetky;
        uint256 _timeexit = _time + _songayhetky * timestampDay;

        if (_timeexit < _timenow){
            paramsOf[_tokenId].opentime = _timenow;
            paramsOf[_tokenId].night = paramsOf[_tokenId].night - paramsOf[_tokenId].nightexit;
        }
        return _tokenId;
    }
    
    function getExitTime(uint256 _tokenId) public view returns(uint256){
        uint256 _time = paramsOf[_tokenId].opentime;
        
        uint256 _songayhetky = paramsOf[_tokenId].songayhetky;
        uint256 _timeexit = _time + _songayhetky * timestampDay;
        
        if(_time < _timeexit){
            return _timeexit;
        }
        return _time;
    }

    function getOptions(uint256 _tokenId) public view returns(Params memory){
        
        return paramsOf[_tokenId];
    }
    
    function setOptions(uint256 _tokenId,string memory _name, uint256 _star, uint256 _night, uint256 _bed, uint256 _exitsaumoinam) public onlyFactory returns(uint256){
        uint256 _time = paramsOf[_tokenId].opentime;
        uint256 _timeupdate = block.timestamp;
        string memory _code = paramsOf[_tokenId].code;
        uint256 _sonam = paramsOf[_tokenId].songaymua;
        uint256 _exitmoiky = paramsOf[_tokenId].nightexit;
        
        paramsOf[_tokenId] = Params(_name,_star, _night,_bed,_sonam,_exitsaumoinam,_code, _time, _timeupdate,_exitmoiky);
        return _tokenId;
    }
   
    function setMinDayBooking(uint256 _minday) public onlyFactory returns(uint256){
        minBookStart = _minday;
    }
    
    function bookingTour(uint256 _tokenId, string memory _name, string memory _email, uint256  _phone, string memory _passport, uint256 _checkin, uint256 _checkout, string memory _hotel) public onlyOwner returns(uint256){
        checkExitTime(_tokenId);
        uint256 _getTokenID = _tokenId;
        address _address = msg.sender;
        uint256 timeBookStart = minBookStart * timestampDay;
        uint256 _timeStartToken = paramsOf[_tokenId].opentime;
        uint256 _timenow = block.timestamp;
        uint256 calcDay = (_checkout - _checkin)/timestampDay;
        require(_timeStartToken - _timenow >= timeBookStart,                 "Error: Booking Start after 30 day");
        require(calcDay <= paramsOf[_getTokenID].night,                 "Error: Max Booking night");
        
        BookingOf[_getTokenID] = Booking(_name, _email, _phone, _passport, _checkin, _checkout, _hotel, "");
        
        
        setRefund(_address,_getTokenID,calcDay);
        return _getTokenID;
    }
    
    function setRefund(address _address, uint256 _tokenId,uint256 calcDay) private returns(uint256){
        
        paramsOf[_tokenId].night = paramsOf[_tokenId].night - calcDay;
        RefundBookingOf[_address][_tokenId].night = calcDay;
    }
    
    function addEvents(uint256 _tokenId,address  _address, string memory _code) public onlyFactory returns(uint256){
        ClaimEventOf[_address].tokenId = _tokenId;
        ClaimEventOf[_address].code = _code;
        return _tokenId;
    }

    function claimEvent() public onlyOwner returns(uint256){
        address _address = msg.sender;
        //string memory _code = ClaimEventOf[_address].code;
        require(ClaimEventOf[_address].tokenId > 0,                 "Error: Address Not Claim Access");
        string memory _code = ClaimEventOf[_address].code;
        if (keccak256(abi.encodePacked(_code)) == keccak256("buyticket")){
            ClaimEventOf[_address].code = "";
        }
        return ClaimEventOf[_address].tokenId;
    }
    
    function refundBooking(address _address, uint256 _tokenId) public onlyFactory returns(uint256){
        
        uint256 _nighrefund = RefundBookingOf[_address][_tokenId].night;
        require(_nighrefund > 0,                 "Error: Address Not Refund Access");
        
        uint256 _timeupdate = block.timestamp;
        uint256 _nigh = paramsOf[_tokenId].night + _nighrefund;
        
        paramsOf[_tokenId].night = _nigh;
        paramsOf[_tokenId].lastupdate = _timeupdate;
        return _tokenId;
        
    }

    function configBooking(address _address, uint256 _tokenId) public onlyFactory returns(uint256){
        
        RefundBookingOf[_address][_tokenId].night = 0;
        RefundBookingOf[_address][_tokenId].opentime = 0;

        
        return _tokenId;
        
    }

    //Set Contract Item Owner
    function setOwner(address _owner) public onlyOwner {
        transferOwnership(_owner);
    }
    //Set Contract Item Fatory
    function setFactory(address _factory) public onlyOwner {
        factory = _factory;
    }

    function setBaseUri(string memory _uri) public onlyOwner {
        _setBaseURI(_uri);
    }
}
