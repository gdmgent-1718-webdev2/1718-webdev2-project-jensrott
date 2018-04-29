import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AuctionsDetailComponent } from './auctions-detail.component';

describe('AuctionsDetailComponent', () => {
  let component: AuctionsDetailComponent;
  let fixture: ComponentFixture<AuctionsDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AuctionsDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuctionsDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
