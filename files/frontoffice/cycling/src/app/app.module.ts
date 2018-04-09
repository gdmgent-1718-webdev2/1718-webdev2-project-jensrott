import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


/* Modules */
import { CoreModule } from './core/core.module'; // footer,header,notfound
import { MaterialModule } from './material/material.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppRoutingModule } from './app-routing.module';

/* Pages Modules */
import { HomeModule } from './home/home.module'; // Card module is in here
import { ProductsModule } from './products/products.module';
import { ProfileModule } from './profile/profile.module';
import { ContactModule } from './contact/contact.module';
import { OfferModule } from './offer/offer.module';

import { AppComponent } from './app.component';


@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    CoreModule,
    MaterialModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    HomeModule,
    ProductsModule,
    ProfileModule,
    ContactModule,
    OfferModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
