import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductsPageComponent } from '../products/pages/products-page/products-page.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [ProductsPageComponent],
  exports: [ProductsPageComponent],
})
export class ProductsModule { }
