import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

/* Components */
import { AuctionsPageComponent } from '../auctions/pages/auctions-page/auctions-page.component';
import { AuctionCardComponent } from './components/auction-card/auction-card.component';
import { AuctionSearchComponent } from './components/auction-search/auction-search.component';
import { AuctionOverviewComponent } from './components/auction-overview/auction-overview.component';
import { AuctionsDetailComponent } from './pages/auctions-detail/auctions-detail.component';
import { AuctionsListComponent } from './components/auctions-list/auctions-list.component';

@NgModule({
  imports: [CommonModule, FormsModule],
  declarations: [
    AuctionsPageComponent,
    AuctionCardComponent,
    AuctionSearchComponent,
    AuctionOverviewComponent,
    AuctionsDetailComponent,
    AuctionsListComponent
  ],
  exports: [AuctionsPageComponent]
})
export class AuctionModule {}
