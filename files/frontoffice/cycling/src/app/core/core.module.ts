import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

/* Components */
import { HeaderComponent } from './components/header/header.component';
import { NotFoundPageComponent } from './pages/not-found-page/not-found-page.component';
import { FooterComponent } from './components/footer/footer.component';

/* API Services */
import { UserService } from './services/user.service';
import { ProductService } from './services/product.service';
import {  BidService } from './services/bid.service';
import {  CategoryService } from './services/category.service';

/* guards */
import { AuthGuard } from './guards/auth.guard';

/* helpers */
import { JwtInterceptor } from './helpers/jwt.interceptors';

/* Other Services */
import { AuthenticationService } from './services/authentication.service'; // all functionality needed for login and authentication
import { AuctionService } from './services/auction.service'; // all functionality needed to create auctions ...


@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    HeaderComponent,
    NotFoundPageComponent,
    FooterComponent,
  ],
  exports: [
    HeaderComponent,
    NotFoundPageComponent,
    FooterComponent,
  ],
  providers: [UserService, ProductService, AuthenticationService, AuctionService, BidService, CategoryService, AuthGuard],
})
export class CoreModule { }
