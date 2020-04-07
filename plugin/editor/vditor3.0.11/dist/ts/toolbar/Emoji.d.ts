/// <reference types="./types" />
import { MenuItem } from "./MenuItem";
export declare class Emoji extends MenuItem {
    element: HTMLElement;
    panelElement: HTMLElement;
    constructor(vditor: IVditor, menuItem: IMenuItem);
    _bindEvent(vditor: IVditor): void;
}
