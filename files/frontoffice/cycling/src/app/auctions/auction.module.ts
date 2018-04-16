import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

/* Components */
import { AuctionsPageComponent } from '../auctions/pages/auctions-page/auctions-page.component';
import { AuctionCardComponent } from './components/auction-card/auction-card.component';
import { AuctionSearchComponent } from './components/auction-search/auction-search.component';
import { AuctionOverviewComponent } from './components/auction-overview/auction-overview.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    AuctionsPageComponent,
    AuctionCardComponent,
    AuctionSearchComponent,
    AuctionOverviewComponent,
  ],
  exports: [AuctionsPageComponent],
})
export class AuctionModule { }
