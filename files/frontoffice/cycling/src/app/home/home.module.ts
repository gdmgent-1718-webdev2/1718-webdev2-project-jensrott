import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomePageComponent } from './pages/home-page/home-page.component';

/* Extern Modules */
import { CardModule } from '../card/card.module';

@NgModule({
  imports: [
    CommonModule,
    CardModule,
  ],
  declarations: [HomePageComponent],
  exports: [
    HomePageComponent,
  ],
})
export class HomeModule { }
