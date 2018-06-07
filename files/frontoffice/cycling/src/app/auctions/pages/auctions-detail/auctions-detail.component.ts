import { Component, OnInit, Input } from '@angular/core';
import { Auction } from '../../../core/models/auction';
import { Bid } from '../../../core/models/bid';
import { BidService } from '../../../core/services/bid.service';
import { AuthenticationService } from '../../../core/services/authentication.service';

@Component({
  selector: 'app-auctions-detail',
  templateUrl: './auctions-detail.component.html',
  styleUrls: ['./auctions-detail.component.scss']
})
export class AuctionsDetailComponent implements OnInit {
  @Input()
  selectedAuction: Auction = null;

  splittedDate: Array<string>;

  currentBid: string;
  currentUser_Id: number;
  today: string = '2018-07-15';

  private bid: Bid = {
    id: '',
    date: '',
    user_id: 1,
    product_id: 1,
    value: 1,
    status: 'Active'
  };

  public newBid: Bid; // to include the new product inserted in the form

  currentDate = new Date();

  constructor(
    private authenticationService: AuthenticationService,
    private bidService: BidService
  ) {}

  ngOnInit() {}

  submitOrder() {
    console.log('currentBid');
    console.log(this.currentBid);
    this.today = this.currentDate.toISOString(); // ISO string is at the end with T
    this.splittedDate = this.today.split('T', 2); // Split everything before T so that backend understands
    console.log(this.splittedDate);
    console.log(this.today);
    this.bid.user_id = this.authenticationService.getCurrentUserId();
    this.bid.date = this.splittedDate[0];
    this.bid.product_id = this.selectedAuction.id;
    this.bid.value = Number(this.currentBid);
    this.bid.status = 'Active';

    this.bidService.addBid(this.bid).subscribe(res => {
      console.log(res);
      this.newBid = res;
      console.log(this.newBid);
    });

    window.location.reload();
  }
}
